<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class CompetencyArea extends Model
{
    public static function getCompetencyArea($code)
    {
        if(!$code) return null;
        $comp_area = CompetencyArea::where(['code' => $code])->first();
        if(!$comp_area) $comp_area = CompetencyArea::where(['description' => $code])->first();
        if (!$comp_area) {
            $comp_area = new CompetencyArea();
            $comp_area->description = $code;
            $comp_area->custom = true;
            $comp_area->code = Helper::createCode($code);
            try {
                $comp_area->save();
            } catch (\Exception $e) {
                $rand = substr(md5(microtime()), rand(0, 26), 5);
                $comp_area->code = $comp_area->code . $rand;
                $comp_area->save();
            }
        }

        return $comp_area;
    }
}
