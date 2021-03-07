<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenderSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(CountriesSeeder::class);
//        $this->call(EventSeeder::class);
        $this->call(BillingTypesSeeder::class);
//        $this->call(EventPrices::class);
        $this->call(MembershipTypeWriteUpSeeder::class);
    }

   function call($class)
    {
        try
        {
            parent::call($class);
        }
        catch (Exception $e)
        {
            echo "Database Seed Error(".$e->getCode()."):".$e->getMessage()."\n";
        }
    }
}
