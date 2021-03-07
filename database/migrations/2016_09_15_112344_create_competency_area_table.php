<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetencyAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('competency_areas', function(Blueprint $table){
            $table->increments('id');
            $table->string('code', 10)->unique();
            $table->string('description', 250)->nullable();
            $table->boolean('custom')->default(false);
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
        Schema::drop('competency_areas');
    }
}
