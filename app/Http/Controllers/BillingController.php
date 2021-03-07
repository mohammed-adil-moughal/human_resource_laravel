<?php

namespace App\Http\Controllers;

use App\MemberBilling;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data['billings'] = Auth::user()->member->MemberBillings;

        return View('billing')->with('data', $data);
    }
}
