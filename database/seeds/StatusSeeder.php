<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = Status::insert([
            ["code"=>"0", "description"=>"New"], //Blue
            ["code"=>"1", "description"=>"Received"], //Blue
            ["code"=>"2", "description"=>"Application"], //Blue
            ["code"=>"3", "description"=>"Review"], //Amber
            ["code"=>"4", "description"=>"Current"], //Green
            ["code"=>"5", "description"=>"Inactive"], //Red
            ["code"=>"6", "description"=>"Blocked"], //Red
            ["code"=>"7", "description"=>"Deceased"] //Grey
        ]);
    }
}
