<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('member_training', function(Blueprint $table){
            $table->increments('id');
            $table->string('Key', 250)->nullable();
            $table->integer('LineNo')->nullable();
            $table->string('Main_Document_No', 20)->nullable();
            $table->string('Organization_Company', 250)->nullable();;
            $table->date('From')->nullable();;
            $table->date('To')->nullable();;
            $table->string('Competency', 30)->nullable();
            $table->string('Hours_Completed', 250)->nullable();;
            $table->string('Trainer', 250)->nullable();
            $table->string('Name', 250)->nullable();;
            $table->boolean('Synched_Web')->default(true)->nullable();
            $table->dateTime('Last_TimeStamp')->nullable();
            $table->boolean('Synched_Nav')->default(false)->nullable();
            $table->integer('Line_No');
            $table->string('NavRecID');
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
        Schema::drop('member_training');
    }
}
