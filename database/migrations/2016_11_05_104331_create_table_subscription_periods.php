<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubscriptionPeriods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Code')->unique();
            $table->string('Description')->nullable();
            $table->dateTime('Start_Date')->nullable();
            $table->dateTime('End_Date')->nullable();
            $table->dateTime('Close_Date')->nullable();
            $table->boolean('Current')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscription_periods');
    }
}
