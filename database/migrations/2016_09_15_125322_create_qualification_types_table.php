<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('qualification_types', function(Blueprint $table){
            $table->increments('id');
            $table->string('code', 10)->unique();
            $table->string('description', 50)->nullable();
            $table->boolean('Professional')->nullable();
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
        Schema::drop('qualification_types');
    }
}
