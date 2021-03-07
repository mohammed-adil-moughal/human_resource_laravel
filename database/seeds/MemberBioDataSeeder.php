<?php

use Illuminate\Database\Seeder;

class MemberBioDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $db = \App\MemberBioData::insert([
            ["Other_Names"=>"Donald", "Surname"=>"Donald","Date_of_Birth"=>"2016-8-10 0:0:0","Member_No"=>"10000","ID_Number"=>"123134","E_mail"=>"donaldduck@disney.de","Mobile_No"=>"02732938","MemberShip_Type"=>"LICENCE", "County"=>"NAIROBI", "Parent_Institution_Customer"=>"AKA","Nationality"=>"Kenya", "Address"=>"81712", "Post_Code"=>"092", "City"=>"Mombasa", "Contact"=>"332121", "Synched_Web"=>false, "No"=> "10000"],

            ["Other_Names"=>"Brian Savatia", "Surname"=>"Keyonzo","Date_of_Birth"=>"2016-8-10 0:0:0","Member_No"=>"10001","ID_Number"=>"123194","E_mail"=>"briankeyonzo@yahoo.com","Mobile_No"=>"0999932938","MemberShip_Type"=>"ASSOCIATE", "County"=>"KWALE", "Parent_Institution_Customer"=>"DELLOITE","Nationality"=>"Kenya", "Address"=>"556012", "Post_Code"=>"0200", "City"=>"Nairobi", "Contact"=>"990121", "Synched_Web"=>false, "No"=> "10001"],

            ["Other_Names"=>"Brian", "Surname"=>"Keyonzo","Date_of_Birth"=>"2016-8-10 0:0:0","Member_No"=>"10002","ID_Number"=>"2563134","E_mail"=>"brianskeyonzo@gmail.com","Mobile_No"=>"077732938","MemberShip_Type"=>"STUDENT", "County"=>"UASIN", "Parent_Institution_Customer"=>"SAP","Nationality"=>"Kenya", "Address"=>"67892", "Post_Code"=>"091", "City"=>"Mombasa", "Contact"=>"002121", "Synched_Web"=>false, "No"=> "10002"],

            ["Other_Names"=>"Adil", "Surname"=>"Moughal","Date_of_Birth"=>"2016-8-10 0:0:0","Member_No"=>"10003","ID_Number"=>"3098313","E_mail"=>"mohammedadil755@gmail.com","Mobile_No"=>"08822938","MemberShip_Type"=>"LICENCE", "County"=>"NAIROBI", "Parent_Institution_Customer"=>"PIA","Nationality"=>"Kenya", "Address"=>"19712", "Post_Code"=>"062", "City"=>"Kisumu", "Contact"=>"41121", "Synched_Web"=>false, "No"=> "10003"],

            ["Other_Names"=>"Liam", "Surname"=>"Neeson","Date_of_Birth"=>"2016-8-10 0:0:0","Member_No"=>"10004","ID_Number"=>"2003134","E_mail"=>"liamneeson53@mail.com","Mobile_No"=>"31008423","MemberShip_Type"=>"STUDENT", "County"=>"BONDO", "Parent_Institution_Customer"=>"KIA","Nationality"=>"Kenya", "Address"=>"80082", "Post_Code"=>"450", "City"=>"Nairobi", "Contact"=>"89791", "Synched_Web"=>false, "No"=> "10004"]
        ]);
    }
}
