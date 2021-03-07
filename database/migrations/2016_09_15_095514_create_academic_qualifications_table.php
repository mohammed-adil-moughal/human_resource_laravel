<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Key', 250)->nullable();
            $table->string('Main_Document_No', 20)->nullable();
            $table->string('Institution', 250)->nullable();
            $table->string('Certificate_Awarded', 50)->nullable();
            $table->string('Area_of_Specialization', 250)->nullable();
            $table->date('From_Date')->nullable();
            $table->date('To_Date')->nullable();
            $table->string('Qualification_code', 20)->nullable();
            $table->string('Qualification_Description', 250)->nullable();
            $table->string('Description', 20)->nullable();
            $table->string('Grade_Level_Attained', 250)->nullable();
            $table->string('attachment', 250)->nullable();
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
        Schema::drop('academic_qualifications');
    }
}
