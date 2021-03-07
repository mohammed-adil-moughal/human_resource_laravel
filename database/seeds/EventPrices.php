<?php

use Illuminate\Database\Seeder;
use App\EventPricing;
class EventPrices extends Seeder
{
         
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventPricing::truncate();
        $db = EventPricing::insert([
        [ 'Early_Bird_CutOff_Date'=>'2016-11-05 00:00:00','Training_Event_Code' =>'12', 'Early_Bird_Price'=>"10000","Regular_Price"=>'11000','Membership_Type'=>0, 'Currency'=>'ksh'],
        [ 'Early_Bird_CutOff_Date'=>'2016-11-05 00:00:00','Training_Event_Code' =>'12', 'Early_Bird_Price'=>"10001","Regular_Price"=>'11001','Membership_Type'=>1, 'Currency'=>'ksh'],

           
        ]);
    }
}
