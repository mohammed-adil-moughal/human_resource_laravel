<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('member_experience', function(Blueprint $table){
            $table->increments('id');
            $table->string('Key', 250)->nullable();
            $table->string('Main_Document_No', 20)->nullable();
            $table->string('Tasks_Performed', 250)->nullable();
            $table->string('Sector', 10)->nullable();
            $table->string('Sector_Description', 50)->nullable();
            $table->string('Name_of_Firm', 250)->nullable();;
            $table->date('From_Date')->nullable();
            $table->date('To_Date')->nullable();
            $table->string('Position_Held', 150)->nullable();;
            $table->string('Contact_Person', 100)->nullable();
            $table->string('Contact_Email', 100)->nullable();
            $table->string('Contact_Phone_No', 30)->nullable();
            $table->string('Contact_Title', 50)->nullable();
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
        Schema::drop('member_experience');
    }
}
