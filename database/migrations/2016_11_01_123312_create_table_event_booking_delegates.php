<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventBookingDelegates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('event_booking_delegates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Event_Code')->nullable();
            $table->string('Registration_No')->nullable();
            $table->string('Delegate_No')->nullable();
            $table->integer('Membership_Type')->nullable();
            $table->string('Member_No')->nullable();
            $table->string('Names')->nullable();
            $table->string('ID_Number')->nullable();
            $table->string('PIN_Registration_No')->nullable();
            $table->string('E_mail')->nullable();
            $table->string('Phone_No')->nullable();
            $table->string('Address')->nullable();
            $table->string('City')->nullable();
            $table->string('Post_Code')->nullable();
            $table->string('County')->nullable();
            $table->string('Date_of_Registration')->nullable();
            $table->boolean('Synched_Web')->default(false);
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
       Schema::drop('event_booking_delegates');
    }
}
