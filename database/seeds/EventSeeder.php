<?php

use Illuminate\Database\Seeder;
use App\Event;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = Event::insert([
            ["Code"=>"12","Description"=>"internatinonal procurement", "Event_Description"=>"Very very very good","Start_Date"=>"2016-12-10 0:0:0","End_Date"=>"2016-8-12 0:0:0","Location"=>"Nyayo Staduim","GPS_Co_ordinates"=>"23232323","Contact_Phone_No"=>"02732938","Type"=>"SEMINARS"],
           
        ]);
    }
}
