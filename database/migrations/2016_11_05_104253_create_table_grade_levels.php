<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGradeLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Code')->unique();
            $table->string('Description')->nullable();
            $table->string('Name')->nullable();
            $table->string('Qualification')->nullable();
            $table->string('Qualification_Code')->nullable();
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
        Schema::drop('grade_levels');
    }
}
