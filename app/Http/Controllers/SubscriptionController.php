<?php

namespace App\Http\Controllers;

use App\SubscriptionPeriod;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(!Auth::user()->member)
            return redirect('/');
        return view('subscription')->with('member', Auth::user()->member)->with('subscription_periods', SubscriptionPeriod::all());
    }
}
