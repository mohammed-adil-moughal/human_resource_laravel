<?php

namespace App\Http\Controllers;

use App\ProfQualifications;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class QualificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if($request->id)
            ProfQualifications::updateProfQualification($request->all(),Auth::user()->member->No );
        else
            ProfQualifications::newProfQualification($request->all(),Auth::user()->member->No );
    }

    public function show($id,Request $request)
    {
        $prof_qualifications = ProfQualifications::where(['Main_Document_No'=>Auth::user()->member->No, 'id' => $id])->first();
        if(!$prof_qualifications)
            abort(401);

        if(\Illuminate\Support\Facades\Request::wantsJson())
        {
            return $prof_qualifications;
        }
    }
      public function view()
    {
        $data['member_bio_data']=Auth::user()->member;
        return view('layouts.member_views.qualifications_view')->with('data',$data);
    }
}
