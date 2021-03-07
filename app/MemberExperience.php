<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberExperience extends NavBaseModel
{
    //
    protected $table = "member_experience";
    protected $fillable = [ 'Position_Held','Name_of_Firm', 'Sector', 'Tasks_Performed',
                            'From_Date', 'To_Date'];

    public function sector()
    {
        return $this->hasOne('App\IndustrySector', 'code', 'Sector');
    }

    public static function newMemberExperience($data, $main_document_no)
    {
        $member_experience = new MemberExperience();
        $member_experience->fill($data);
        $member_experience->Main_Document_No = $main_document_no;
        $member_experience->setLineNo();
        $member_experience->websave();
    }

    public static function updateMemberExperience($data, $main_document_no)
    {
        $experience = MemberExperience::where(['id' => $data['id'],
            'Main_Document_No' => $main_document_no])->first();
        if(!$experience) return;
        $experience->fill($data);
        $experience->websave();
    }
}
