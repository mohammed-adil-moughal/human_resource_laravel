<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    //
    protected  $table = 'genders';

    public static function getDesc($code)
    {
        return Gender::where('code', $code)->first()->description;

    }
}
