<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MemberBioData extends NavBaseModel
{

    protected $fillable = array('Surname', 'Other_Names','ID_Number','E_mail','Mobile_No', 'County',
        'Parent_Institution_Customer', 'Date_Of_Birth', 'PIN_Registration_No', 'Nationality', 'Picture', 'Gender',
        'Conviction', 'Offence', 'Date_and_Place', 'Sentence', 'Referee_Name', 'Referee_Address', 'Referee_Telephone',
        'Referee_Email', 'Pass_Port_No', 'Country_Region_Code','Referee_Telephone','Address', 'Address_2',
        'City', 'Post_Code', 'Home_Page', 'Contact', 'Fax_No', 'Review_Recommendation', 'MemberShip_Type', 'NavRecID');



    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user');
    }

    public function MembershipType()
    {
        return $this->hasOne('App\MembershipTypes','Code', 'MemberShip_Type');
    }

    public function ProfQualifications()
    {
        return $this->hasMany('App\ProfQualifications', 'Main_Document_No', 'No');
    }

    public function AcademicQualifications()
    {
        return $this->hasMany('App\AcademicQualification', 'Main_Document_No', 'No');
    }

    public function MemberExperiences()
    {
        return $this->hasMany('App\MemberExperience', 'Main_Document_No', 'No');
    }

    public function MemberTrainings()
    {
        return $this->hasMany('App\MemberTraining', 'Main_Document_No', 'No');
    }

    public function MemberSubscriptions()
    {
        return $this->hasMany('App\MemberSubscription', 'Member_No', 'Member_No');
    }

    public function MemberBillings()
    {
        return $this->hasMany('App\MemberBilling', 'Member_No', 'NavRecID');
    }

    public function MemberCompetencies()
    {
        return $this->hasMany('App\MemberCompetency', 'Main_Document_No', 'No');
    }

    public function MemberIndustrySectors()
    {
        return $this->hasMany('App\MemberIndustrySector', 'Main_Document_No', 'No');
    }

    public function Country()
    {
        return $this->hasOne('App\AppCountry', 'country_code', 'Country_Region_Code');
    }

    public function gender()
    {
        return $this->hasOne('App\Gender', 'code', 'Gender');
    }

    public function MemberStatus()
    {
        return $this->hasOne('App\Status', 'code', 'Status');
    }
    public static function newMember($data, $user_id)
    {
        if(isset($data["MemberShip_Type"])) $data["MemberShip_Type"] == ""? $data["MemberShip_Type"] = NULL:$data["MemberShip_Type"] ;
        $member_bio_data = new MemberBioData();
        $member_bio_data->fill($data);
        $member_bio_data->No = uniqid();
        $member_bio_data->user = $user_id;
        $member_bio_data->Application_Date = date("Y-m-d H:i:s");
        $member_bio_data->Gender = Gender::where('description', $member_bio_data->Gender)->first()->code;
        $member_bio_data->websave();
        return $member_bio_data;
    }
}
