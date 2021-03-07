<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;

class InstitutionController extends Controller
{
    public function index()
    {
        return Institution::all();
    }
}
