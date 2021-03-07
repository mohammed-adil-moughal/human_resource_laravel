<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberIndustrySector extends Model
{
    public function IndustrySector()
    {
        return $this->hasOne('App\IndustrySector', 'code', 'industry_sector');
    }

    public static function newMemberSector($data, $main_document_no)
    {
        $member_sector = new MemberIndustrySector();


        if(($industry_sector = IndustrySector::getIndustrySector($data)) )
        {
            $member_sector->industry_sector = $industry_sector->code;
        }

        $member_sector->Main_Document_No = $main_document_no;
        $member_sector->websave();
    }

    public function websave(array $options = array())
    {
        $this->save($options);
    }
}
