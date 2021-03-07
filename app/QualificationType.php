<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class QualificationType extends Model
{
    //
    protected $fillable = [ 'code', 'description'];

    public static function getQualificationType($code)
    {
        if(!$code) return null;
        $qualf_type = QualificationType::where(['code' => $code])->first();
        if(!$qualf_type) $qualf_type = QualificationType::where(['description' => $code])->first();
        if (!$qualf_type) {
            $qualf_type = new QualificationType();
            $qualf_type->description = $code;
            $qualf_type->custom = true;
            $qualf_type->code = Helper::createCode($code);
            try {
                $qualf_type->save();
            } catch (\Exception $e) {
                $rand = substr(md5(microtime()), rand(0, 26), 5);
                $qualf_type->code = $qualf_type->code . $rand;
                $qualf_type->save();
            }
        }

        return $qualf_type;
    }
}
