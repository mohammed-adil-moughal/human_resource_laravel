<?php

namespace App\Http\Controllers;

use App\IndustrySector;
use App\MemberIndustrySector;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class IndustrySectorController extends Controller
{
    public function index()
    {
        return IndustrySector::where('custom', false)->get();
    }

    public function storeMemberIndustrySectors(Request $request)
    {
        MemberIndustrySector::where('Main_Document_No', Auth::user()->member->No)->delete();
        if($request->data)
        {
            foreach ($request->data as $data)
            {
                MemberIndustrySector::newMemberSector($data, Auth::user()->member->No);
            }
        }
    }
}
