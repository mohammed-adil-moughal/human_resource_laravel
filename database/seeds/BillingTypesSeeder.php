<?php

use Illuminate\Database\Seeder;

class BillingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = \App\BillingType::insert([
            ["Code"=>"0", "Description"=>"Application"],
            ["Code"=>"1", "Description"=>"Payment"],
            ["Code"=>"2", "Description"=>"Subscription"],
            ["Code"=>"3", "Description"=>"License"],
            ["Code"=>"4", "Description"=>"Certificate"],
            ["Code"=>"5", "Description"=>"Status"],
            ["Code"=>"6", "Description"=>"Card"],
            ["Code"=>"7", "Description"=>"MembershipType"],
            ["Code"=>"8", "Description"=>"IDChange"],
            ["Code"=>"9", "Description"=>"ContactInfoPhone"],
            ["Code"=>"10", "Description"=>"ContactInfoEmail"]
        ]);
    }
}
