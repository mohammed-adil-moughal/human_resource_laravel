<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustrySectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('industry_sector', function(Blueprint $table ){
            $table->increments('id');
            $table->string('code', 20)->unique();
            $table->string('description', 50)->nullable();
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
        Schema::drop('industry_sector');
    }
}
