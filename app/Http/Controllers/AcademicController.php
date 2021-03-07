<?php

namespace App\Http\Controllers;

use App\AcademicQualification;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AcademicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if($request->id)
            AcademicQualification::updateAcademicQualification($request->all(),Auth::user()->member->No);
        else
            AcademicQualification::newAcademicQualification($request->all(),Auth::user()->member->No);
    }
    
    public function edit($id, $request)
    {
        $request->id = $id;
        AcademicQualification::updateAcademicQualification($request->all(),Auth::user()->member->No);
    }

    public function index()
    {
        $data['member_bio_data'] = Auth::user()->member;
        return view('academics')->with('data', $data);
    }

    public function show($id,Request $request)
    {
        $academic = AcademicQualification::where(['Main_Document_No'=>Auth::user()->member->No, 'id' => $id])->first();
        if(!$academic)
            abort(401);

        if(\Illuminate\Support\Facades\Request::wantsJson())
        {
            return $academic;
        }
    }
    public function view()
    {
        $data['member_bio_data']=Auth::user()->member;
        return view('layouts.member_views.academics_view')->with('data',$data);
    }
}
