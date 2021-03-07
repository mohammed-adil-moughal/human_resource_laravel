<?php

namespace App\Http\Controllers;

use App\QualificationType;
use Illuminate\Http\Request;

use App\Http\Requests;

class QualificationTypeController extends Controller
{
    public function index()
    {
        return QualificationType::all();
    }
}
