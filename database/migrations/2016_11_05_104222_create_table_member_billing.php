<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMemberBilling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_billings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Key')->nullable();
            $table->string('Member_No')->nullable();
            $table->string('Entry_No')->unique();
            $table->dateTime('Date')->nullable();
            $table->integer('Type')->nullable();
            $table->string('Document_No')->nullable();
            $table->string('Customer_Ledger_Entry_No')->nullable();
            $table->string('Reason')->nullable();
            $table->string('Old_Value')->nullable();
            $table->string('New_Value')->nullable();
            $table->dateTime('Last_TimeStamp')->nullable();
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
        Schema::drop('member_billings');
    }
}
