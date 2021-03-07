<?php

namespace App\Http\Controllers;

use App\GradeLevel;
use Illuminate\Http\Request;

use App\Http\Requests;

class GradeLevelController extends Controller
{
    public function index()
    {
        return GradeLevel::all();
    }
}
