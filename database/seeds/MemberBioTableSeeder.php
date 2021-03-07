<?php

use Illuminate\Database\Seeder;

class MemberBioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_bio_datas')->insert([
            'application_no' => str_random(10),
            'customer_no' => str_random(10),
            'surname' => str_random(10),
            'other_names' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
