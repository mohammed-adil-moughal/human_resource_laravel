<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('member_subscriptions', function(Blueprint $table){
            $table->increments('id');
            $table->string('Key')->unique();
            $table->string('Member_No');
            $table->integer('Status')->nullable();
            $table->string('Application_MemberShip_Type')->nullable();
            $table->string('Subscription_Period')->unique();
            $table->string('Remarks')->nullable();
            $table->dateTime('Date_Created')->nullable();
            $table->string('User_ID')->nullable();
            $table->boolean('Billed')->nullable();
            $table->decimal('Total_Billed', 8, 2)->nullable();
            $table->decimal('Total_Paid', 8, 2)->nullable();
            $table->boolean('Card_Printed')->nullable();
            $table->dateTime('Card_Print_Date')->nullable();
            $table->boolean('Card_Collected')->nullable();
            $table->dateTime('Card_Collection_Date')->nullable();
            $table->string('Card_Collected_By')->nullable();
            $table->string('Card_Print_UserID')->nullable();
            $table->boolean('Synched_Web')->default(true)->nullable();
            $table->dateTime('Last_TimeStamp')->nullable();
            $table->boolean('Synched_Nav')->default(false)->nullable();
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
        Schema::drop('member_subscriptions');
    }
}
