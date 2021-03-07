<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected  $table = 'status';
    public static function getDesc($code)
    {
        return Status::where('code', $code)->first()->description;

    }
}
