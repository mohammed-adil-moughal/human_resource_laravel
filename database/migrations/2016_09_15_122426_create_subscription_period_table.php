<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subscription_table', function(Blueprint $table){
            $table->increments('id');
            $table->string('code', 10);
            $table->string('description', 250);
            $table->date('start_date');
            $table->date('end_date');
            $table->date('close_date');
            $table->boolean('current');
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
        //

        Schema::drop('subscription_table');
    }
}
