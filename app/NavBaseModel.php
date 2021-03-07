<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NavBaseModel extends Model
{
    public function websave($web = true, array $options = array())
    {
        $this->Synched_Web = $web;
        $this->save($options);
    }

    public function setLineNo($line_no = 'Line_No')
    {
        $line_no = $this::where('NavRecID',  $this->Main_Document_No)->max('Line_No');
        $line_no = $line_no? $line_no + 1 : 1;
        $this['Line_No'] = $line_no;
        $this->NavRecID = $this->Main_Document_No;
    }
}
