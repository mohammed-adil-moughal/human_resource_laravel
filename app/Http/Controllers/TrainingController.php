<?php

namespace App\Http\Controllers;

use App\MemberTraining;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if($request->id)
            MemberTraining::updateTraining($request->all(),Auth::user()->member->No);
        else
            MemberTraining::newMemberTraining($request->all(),Auth::user()->member->No );
    }

    public function show($id,Request $request)
    {
        $training = MemberTraining::where(['Main_Document_No'=>Auth::user()->member->No, 'id' => $id])->first();
        if(!$training)
            abort(401);

        if(\Illuminate\Support\Facades\Request::wantsJson())
        {
            return $training;
        }
    }
      public function view()
    {
        $data['member_bio_data']=Auth::user()->member;
        return view('layouts.member_views.training_view')->with('data',$data);
    }
}
