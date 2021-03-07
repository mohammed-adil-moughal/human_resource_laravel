<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class EventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
           
            $table->longText('Event_Description')->nullable();
            $table->string('Venue_Description')->nullable();
            $table->string('Venue_Image')->nullable();
            $table->string('Venue_Image_details')->nullable();
            $table->string('Contact_Email')->nullable();
            $table->string('Contact_Phone_No')->nullable();
            $table->string('Code')->unique();
            $table->string('No')->unique();
            $table->string('Description')->nullable();
            $table->string('Type')->nullable();
            $table->dateTime('Start_Date')->nullable();
            $table->dateTime('End_Date')->nullable();
            $table->string('Location')->nullable();
            $table->string('Provider')->nullable();
            $table->decimal('CPD_Hours', 8, 2)->nullable();
            $table->string('Qualification')->nullable();
            $table->string('GPS_Co_ordinates')->nullable();
            $table->string('Global_Dimension_2_Code')->nullable();   
            $table->string('Status')->nullable();
            $table->dateTime('Booking_Cut_Off_Date')->nullable();
           
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
        Schema::drop('events');
    }
}
