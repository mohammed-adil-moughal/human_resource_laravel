<?php

namespace App\Http\Controllers;

use App\AcademicAttachment;
use App\AcademicQualification;
use App\MemberBioData;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AcademicQualificationController extends Controller
{
    public function getAttachment($id)
    {
        $member = Auth::user()->member;
        $academic_qualification = AcademicQualification::where([['id', '=', $id],['Main_Document_No', '=', $member->No] ])->first();

        try{
            return response()->download(storage_path("app/assets/user_".Auth::user()->id."/academic_attachments/".$academic_qualification->attachment));
        }
        catch (\Exception $e)
        {
        }

    }

    public function  getAcademicQualification(Request $request)
    {
        
    }
}
