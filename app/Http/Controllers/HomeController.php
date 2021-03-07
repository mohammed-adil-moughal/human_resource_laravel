<?php

namespace App\Http\Controllers;

use App\AcademicQualification;
use App\AppCountry;
use App\EventBookingEntry;
use App\Helpers\Helper;
use App\Helpers\NavSoapClient;
use App\Http\Requests;
use App\Institution;
use App\MemberBilling;
use App\MemberBioData;
use App\MemberCompetency;
use App\MemberExperience;
use App\MembershipTypes;
use App\MemberTraining;
use App\ProfQualifications;
use App\QualificationType;
use Faker\Provider\DateTime;
use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use FPDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use NavRouter;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
    
    }

    public function pricing(Request $request)
    {
        $data = array();
        // If user already has a profile, redirect there
        if(Auth::check())
        {
            if(MemberBioData::where('user', $user_id = Auth::user()->id)->first()){
                return redirect('/profile');
            }
        }
        else
        {
            return view('auth/login');
        }

        $data['membertypes'] = MembershipTypes::all();
        return view('pricing')->with('data', $data);
    }

    public function contactUs(Request $request)
    {
        $data = array();

        return view('contact_us')->with('data', $data);
    }

    public function getSignUpForm(Request $request)
    {
        $logo_path =  public_path('/assets/images/logo_1.jpg');
        $data = file_get_contents($logo_path);
        $base64 = 'data:image/jpeg;base64,' . base64_encode($data);

        $data = array();
        $data['logo'] = $base64;
        $member = array();
        if($request->isMethod('post'))
        {
            $data['member'] = $request->all();
        }
        else
        {
            $member = Auth::user()->member;
            $academics = $member->AcademicQualifications->toArray();

            $data['member'] = $member;
            $data['member']['academics'] = $academics;
            $data['member']['prof_qualifications'] = $member->ProfQualifications->toArray();
            $data['member']['experience'] = $member->MemberExperiences->toArray();
            $data['member']['training'] = $member->MemberTrainings->toArray();
        }


        if(isset($data['member']['Country_Region_Code']))
        {
            $data['member']['Nationality'] = AppCountry::getName($data['member']['Country_Region_Code']);
        }

        $pdf = \PDF::loadView('applicationform', $data);
        return $pdf->stream('application.pdf');
    }

    public function test(Request $request)
    {      
//        abort(404); $eventbookingentry->Event->EventPricing->first()->Currency;
        echo \App\Event::all()->first()->EventPricing->first();    
    }

    public function checkID(Request $request)
    {
        if( MemberBioData::where('ID_Number', $request->ID_Number)->first())
        {
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
    }

    public function search(Request $request)
    {
        $data = null;
        $query = null;
        if($request->q)
        {
            $query = $request->q;
            $data =  MemberBioData::orderBy("Other_Names", "asc")->where('Surname', 'LIKE', "%$request->q%")
                ->select('id','Surname','Other_Names', 'Member_No', 'Address', 'Status')
                ->orWhere('Other_Names', 'LIKE', "%$request->q%")
                ->orWhere('Member_No', 'LIKE', "%$request->q%")->paginate(25);

            if($request->frmt == 'JSON')
                return $data;
        }
        return view('search')->with('data', $data)->with('query', $query);
    }

    public function paymentView(Request $request)
    {
        if($request->membership_type)
        {
           $m = MembershipTypes::where('Code', $request->membership_type)->first();
            return view('layouts.signup_layouts.payment_info')->with('data', $m);
        }
    }
}