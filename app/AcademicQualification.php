<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AcademicQualification extends NavBaseModel
{
    protected $table = 'academic_qualifications';
    protected $fillable = [ 'Qualification_Description','Qualification_code','Institution', 'Description', 'Attachment','Grade_Level_Attained',
        'From_Date', 'To_Date', 'ApplicationNo', 'Area_of_Specialization'];

    public function Qualification()
    {
        return $this->hasOne('App\QualificationType', 'code', 'Qualification_code');
    }

    public function GradeLevel()
    {
        return $this->hasOne('App\GradeLevel', 'code', 'Grade_Level_Attained');
    }

    public static function newAcademicQualification($data, $main_document_no)
    {
        $academic_qualification = new AcademicQualification();
        if(isset($data['Qualification_Description']))
        {
            if(($qualf_type = QualificationType::getQualificationType($data['Qualification_Description'])) )
            {
                $data['Qualification_code'] = $qualf_type->code;
            }
        }

        $academic_qualification->fill($data);
        $academic_qualification->Main_Document_No = $main_document_no;
        $academic_qualification->setLineNo();
        $academic_qualification->websave();
    }

    public static function updateAcademicQualification($data, $main_document_no)
    {
        $academic_qualification = AcademicQualification::where(['id' => $data['id'],
            'Main_Document_No' => $main_document_no])->first();
        if(!$academic_qualification) return;
        if(isset($data['Qualification_Description']))
        {
            if(($qualf_type = QualificationType::getQualificationType($data['Qualification_Description'])) )
            {
                $data['Qualification_code'] = $qualf_type->code;
            }
        }
        $academic_qualification->fill($data);
        $academic_qualification->websave();
    }
}
