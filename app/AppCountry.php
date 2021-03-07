<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppCountry extends Model
{
    //
    protected $table = 'apps_countries';

    public static function getName($code)
    {
        try{
            return AppCountry::where('country_code', $code)->first()->country_name;
        }
        catch (\Exception $e)
        {
            return null;
        }
    }
}
