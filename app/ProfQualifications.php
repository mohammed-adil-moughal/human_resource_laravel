<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfQualifications extends NavBaseModel
{
    //
    protected $table = "prof_qualifications";
    protected $fillable = [ 'Registration_No','Qualification_Description', 'Qualification_code','Name_of_Body', 'Stages_Sections_Modules',
        'Date_Passed', 'Description'];

    public function qualification_types()
    {
        return $this->hasOne('App\QualificationType', 'code', 'Qualification_code');
    }

    public static function newProfQualification($data, $main_document_no)
    {
        $prof_qualification = new ProfQualifications();

        if(isset($data['Qualification_Description']))
        {
            if(($institute = QualificationType::getQualificationType($data['Qualification_Description'])) )
            {

                $data['Qualification_code'] = $institute->code;
            }
        }

        $prof_qualification->fill($data);
        $prof_qualification->Main_Document_No = $main_document_no;
        $prof_qualification->setLineNo();
        $prof_qualification->websave();
    }

    public static function updateProfQualification($data, $main_document_no)
    {
        $prof_qualification  = ProfQualifications::where(['id' => $data['id'],
            'Main_Document_No' => $main_document_no])->first();

        if(!$prof_qualification) return;

        if(isset($data['Qualification_Description']))
        {
            if(($institute = QualificationType::getQualificationType($data['Qualification_Description'])) )
            {

                $data['Qualification_code'] = $institute->code;
            }
        }
        $prof_qualification->fill($data);
        $prof_qualification->websave();
    }
}
