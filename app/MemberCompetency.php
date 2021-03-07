<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberCompetency extends Model
{
    public function Competency()
    {
        return $this->hasOne('App\CompetencyArea', 'code', 'competency_area');
    }

    public static function newMemberCompetency($data, $main_document_no)
    {
        $member_competency = new MemberCompetency();
        $code = null;
        if(($comp_area = CompetencyArea::getCompetencyArea($data)))
        {
            $member_competency->competency_area = $comp_area->code;
        }
        $member_competency->Main_Document_No = $main_document_no;
        $member_competency->websave();
    }

    public function websave(array $options = array())
    {
        $this->save($options);
    }
}
