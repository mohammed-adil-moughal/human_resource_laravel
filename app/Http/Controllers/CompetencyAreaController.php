<?php

namespace App\Http\Controllers;

use App\CompetencyArea;
use App\MemberCompetency;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CompetencyAreaController extends Controller
{

    public function index()
    {
        return CompetencyArea::where('custom', false)->get();
    }

    public function storeMemberCompetencies(Request $request)
    {
        MemberCompetency::where('Main_Document_No', Auth::user()->member->No)->delete();
        if($request->data)
        {
            foreach ($request->data as $data)
            {
                MemberCompetency::newMemberCompetency($data, Auth::user()->member->No);
            }
        }
    }
}
