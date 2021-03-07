<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prof_qualifications', function(Blueprint $table){
           $table->increments('id');
            $table->string('Key', 250)->nullable();
            $table->string('Main_Document_No', 20)->nullable();
            $table->string('Name_of_Body', 250)->nullable();;
            $table->string('Registration_No', 50)->nullable();;
            $table->string('Stages_Sections_Modules', 250)->nullable();;
            $table->date('Date_Passed')->nullable();
            $table->string('Qualification_code', 20)->nullable();
            $table->string('Qualification_Description', 250)->nullable();
            $table->string('Description', 50)->nullable();
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
        Schema::drop('prof_qualifications');
    }
}
