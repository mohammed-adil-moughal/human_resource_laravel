<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected  $fillable = array('code', 'name');

    public static function getInstitute($code)
    {
        if(!$code) return null;
        $institute = Institution::where(['code' => $code])->first();
        if(!$institute) $institute = Institution::where(['name' => $code])->first();

        if (!$institute) {
            $institute = new Institution();
            $institute->name = $code;
            $institute->custom = true;
            $institute->code = Helper::createCode($code);
            try {
                $institute->save();
            } catch (\Exception $e) {
                $rand = substr(md5(microtime()), rand(0, 26), 5);
                $institute->code = $institute->code . $rand;
                $institute->save();
            }
        }

        return $institute;
    }

}
