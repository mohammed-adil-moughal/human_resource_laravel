<?php

namespace App\Http\Controllers;

use App\MemberExperience;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if($request->id)
            MemberExperience::updateMemberExperience($request->all(), Auth::user()->member->No);
        else
            MemberExperience::newMemberExperience($request->all(), Auth::user()->member->No);
    }

    public function show($id,Request $request)
    {
        $experience = MemberExperience::where(['Main_Document_No'=>Auth::user()->member->No, 'id' => $id])->first();
        if(!$experience)
            abort(401);

        if(\Illuminate\Support\Facades\Request::wantsJson())
        {
            return $experience;
        }
    }
     public function view()
    {
        $data['member_bio_data']=Auth::user()->member;
        return view('layouts.member_views.experience_view')->with('data',$data);
    }
}
