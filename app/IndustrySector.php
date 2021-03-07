<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class IndustrySector extends Model
{
    //
    protected $table = 'industry_sector';

    public static function getIndustrySector($code)
    {
        if(!$code) return null;
        $industry_sector = IndustrySector::where(['code' => $code])->first();
        if(!$industry_sector) $industry_sector = IndustrySector::where(['description' => $code])->first();
        if (!$industry_sector) {
            $industry_sector = new IndustrySector();
            $industry_sector->description = $code;
            $industry_sector->custom = true;
            $industry_sector->code = Helper::createCode($code);
            try {
                $industry_sector->save();
            } catch (\Exception $e) {
                $rand = substr(md5(microtime()), rand(0, 26), 5);
                $industry_sector->code = $industry_sector->code . $rand;
                $industry_sector->save();
            }
        }

        return $industry_sector;
    }
}
