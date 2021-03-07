<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipTypes extends Model
{
    public static function getDesc($code)
    {
        return MembershipTypes::where('code', $code)->first()->description;

    }
}
