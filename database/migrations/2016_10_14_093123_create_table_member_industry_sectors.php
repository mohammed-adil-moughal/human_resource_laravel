<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMemberIndustrySectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_industry_sectors', function(Blueprint $table){
            $table->increments('id');
            $table->string('Key', 250)->nullable();
            $table->string('Main_Document_No')->nullable();;
            $table->string('industry_sector')->nullable();;
            $table->integer('user')->nullable();
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
        Schema::drop('member_industry_sectors');
    }
}
