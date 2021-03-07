<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberTraining extends NavBaseModel
{
    protected $table = 'member_training';
    protected $fillable = [ 'Name','Organization_Company', 'From', 'To',
        'Competency', 'Hours_Completed', 'Trainer'];

    public static function newMemberTraining($data, $main_document_no)
    {
        $training = new MemberTraining();
        $training->fill($data);
        $training->Main_Document_No = $main_document_no;
        $training->setLineNo();
        $training->websave();
    }
    public static function updateTraining($data, $main_document_no)
    {
        $training  = MemberTraining::where(['id' => $data['id'],
            'Main_Document_No' => $main_document_no])->first();
        if(!$training) return;
        $training->fill($data);
        $training->websave();
    }
}
