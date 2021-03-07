<?php

namespace App\Http\Controllers;

use App\AcademicQualification;
use App\CompetencyArea;
use App\County;
use App\Gender;
use App\Helpers\NavSoapClient;
use App\IndustrySector;
use App\Institution;
use App\MemberCompetency;
use App\MemberExperience;
use App\MemberIndustrySector;
use App\MembershipTypes;
use App\MemberTraining;
use App\ParentInstitution;
use App\ProfQualifications;
use App\QualificationType;
use App\Status;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\MemberBioData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\Yaml\Tests\A;
use NavRouter;

class MemberController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth')->except(['create', 'show', 'get','getPicture']);
    }

    public function profile() {
        // If the user does not have a membership profile create one
        $member = MemberBioData::where('user', Auth::user()->id)->first();
        if (!$member) {
            $messages = array();
            $message = \Flash::create(\Flash::$ERROR, 'Choose a plan to continue.');
            array_push($messages, $message);
            Session::flash('messages', $messages);
            return redirect('/');
        }
        $data = array();
        $data['active'] = "home";
        $data['member_bio_data'] = $member;
        return view('profile')->with('data', $data);
    }

    public function create(Request $request) {
        $data = array();
        if (!Auth::Check()) {
            $messages = array();
                $message = \Flash::create(\Flash::$INFO, 'Please Register to continue.');
                array_push($messages, $message);
                Session::flash('messages', $messages);
            return redirect('/register');
        } 
        else {
            // If the user already has a profile, redirect him to his page
            $user_id = Auth::user()->id;
            if (MemberBioData::where('user', $user_id)->first()) {
                return redirect('/profile');
            }

            $membership_type = MembershipTypes::where('code', $request->membership_type)->first();
            if (!$membership_type || $membership_type->code == 'DECLINE') {
                $messages = array();
                $message = \Flash::create(\Flash::$INFO, 'Select a package to continue.');
                array_push($messages, $message);
                Session::flash('messages', $messages);
                return redirect('/');
            }
            $data['user'] = Auth::user();
            $data['counties'] = County::all();
            $data['ParentInstitutions'] = ParentInstitution::all();
            $data['membership_type'] = $request->membership_type;
            return view('signup')->with('data', $data);
        }
    }

    public function show(Request $request)
    {
        if($request->no)
        {
            $member = MemberBioData::where("Member_No", $request->no)->first();
            if(!$member) return null;
            return $member->Other_Names." ".$member->Surname;
        }
        return Auth::user()->Member;
    }

    public function get($id, Request $request)
    {
        if($id)
        {
           $member =  MemberBioData::find($id);
            if($request->frmt=="JSON")
                return $member;

            return view('member')->with('data', $member);
        }
    }



    public function update(Request $request)
    {
        $member = Auth::user()->Member;
        $member->fill($request->all());
        $member->websave();
    }

    public function store(Request $request) {

        $data = array();
        // If the user already has a profile, redirect him to his page
        $user_id = Auth::user()->id;
        if (MemberBioData::where('user', $user_id)->first()) {
            return redirect('/profile')->with('data', $data);
        }
        $membership_type = MembershipTypes::where('code', $request->MemberShip_Type)->first();
        if (!$membership_type || $membership_type->code == 'DECLINE') {
            $messages = array();
            $message = \Flash::create(\Flash::$INFO, 'Select a package to continue.');
            array_push($messages, $message);
            Session::flash('messages', $messages);
            return redirect('/');
        }

        $member_bio_data = MemberBioData::newMember($request->all(), Auth::user()->id);

        if($request->academics)
        {
            foreach ($request->academics as $x) {
                try{ AcademicQualification::newAcademicQualification($x,Auth::user()->member->No); }catch (\Exception $e){}
            }
        }
        if($request->experience )
        {
            foreach ($request->experience as $x) {
                try{ MemberExperience::newMemberExperience($x, Auth::user()->member->No); }catch (\Exception $e){}
            }
        }
        if($request->prof_qualifications)
        {
            foreach ($request->prof_qualifications as $x) {
                try{ ProfQualifications::newProfQualification($x,Auth::user()->member->No ); }catch (\Exception $e){}
            }
        }
        if($request->training)
        {
            foreach ($request->training as $x) {
                try{   MemberTraining::newMemberTraining($x, Auth::user()->member->No); }catch (\Exception $e){}
            }
        }

        if ($request->competencies) {
            foreach ($request->competencies as $x) {
                try{    MemberCompetency::newMemberCompetency($x, Auth::user()->member->No); }catch (\Exception $e){}
            }
        }

        if ($request->sectors) {
            foreach ($request->sectors as $x) {
                try{   MemberIndustrySector::newMemberSector($x, Auth::user()->member->No); }catch (\Exception $e){}
            }
        }
    }

    public function getView(Request $request) {
        $new = false;
        $member = MemberBioData::where('user', Auth::user()->id)->first();
        $member->Status = Status::getDesc($member->Status);
        $code = $member->No;

        $data = array();
        $academic_qualification = array();
        $competencies = array();
        $data['member_bio_data'] = $member;
        $view_name = $request->view;
        switch ($view_name) {
            case 'academic':
                $data['institutions'] = Institution::orderBy('name', 'ASC')->get();
                break;
            case 'competency':
                break;
            case 'experience':
                $data['sectors'] = IndustrySector::all();
                break;
            case 'professional':
                $data['sectors'] = IndustrySector::all();
                $data['qualification_types'] = QualificationType::all();
                break;
            case 'training':
                $data['competencies'] = CompetencyArea::all();
                $data['industry_sectors'] = CompetencyArea::all();
                break;
            case 'basic':
                $data['counties'] = County::all();
                $data['ParentInstitutions'] = ParentInstitution::all();
                break;
        }
        return view('layouts/profile_layouts/' . $view_name . '_profile_view')->with('data', $data);
    }

    public function getPicture(Request $request) {
        if($request->no)
        {
            if($id = Crypt::decrypt($request->no))
            {
                $member = MemberBioData::find($id);
                try{
                    return response()->download(storage_path("app/assets/user_" . $member->user ."/profile_picture/" .$member->Picture));
                }
                catch (\Exception $e)
                {
                    return response()->download(storage_path("app/assets/images/no_user.gif"));
                }
            }
        }

        if(!Auth::check())
            return;
        $member = Auth::user()->member;
        if (!$member->Picture) {
            return response()->download(storage_path("app/assets/images/no_user.gif"));
        }

        try {
            return response()->download(storage_path("app/assets/user_" . Auth::user()->id ."/profile_picture/" .$member->Picture));
        } catch (\Exception $e) {
            return response()->download(storage_path("app/assets/images/no_user.gif"));
        }
    }

    public function existing() {
        return view('member/existing');
    }

    public function uploadPicture(Request $request) {
        $file = $request->file('picture');
        if ($file->getSize() > 1000000) {
            echo "{ \"error\":\"File size too large.\"}";
            return;
        }

        $member = MemberBioData::where('user', Auth::user()->id)->first();
        $filename = $file->getClientOriginalName();
        if (Storage::disk('local')->put("assets/user_" . Auth::user()->id . "/profile_picture/" . $file->getClientOriginalName(), file_get_contents($file)))
        {
            if($member = Auth::user()->member)
            {
                $member->Picture = $filename;
                $member->save();
                return redirect('profile/settings');
            }
            else echo $filename;
        }
    }

    public function uploadAttachment(Request $request) {
        // Get the file from the post
        $file = $request->file('attachment');

        // Check the size
        if ($file->getSize() > 25000000) {
            echo "{ \"error\":\"File size too large.\"}";
            return;
        }

        // Create a new model instance

        $filename = $file->getClientOriginalName();
        Storage::disk('local')->put("assets/user_" . Auth::user()->id . "/academic_attachments/" . $file->getClientOriginalName(), file_get_contents($file));

        echo $filename;
    }

    private function createCode($s) {
        return strtoupper(preg_replace('~\b(\w)|.~', '$1', $s));
    }

    public function settings()
    {
        $data['member_bio_data'] = Auth::user()->member;
        $data['active'] = "settings";
        return view('settings')->with('data', $data);
    }

    public function cards()
    {
        $data['member_bio_data'] = Auth::user()->member;
        $data['active'] = "cards";
        return view('membership_cards')->with('data', $data);
    }

    public function certificates()
    {
        $data['member_bio_data'] = Auth::user()->member;
        $data['active'] = "certificates";
        return view('membership_certs')->with('data', $data);
    }

}
