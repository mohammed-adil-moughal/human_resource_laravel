<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AppCountry;

class AppCountryController extends Controller
{
    //
    public function index()
    {
        $apps_countries = array();
        try{

            $apps_countries = AppCountry::all()->toArray();
        }
        catch (\Exception $e)
        {
            $apps_countries = AppCountry::all()->toArray();
        }
        $data = json_encode($apps_countries);
        echo $data;
    }
}
