<?php

use Illuminate\Database\Seeder;
use App\Gender;


class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = Gender::insert([
            ["code"=>"0", "description"=>"Male"],
            ["code"=>"1", "description"=>"Female"]
        ]);
    }
}
