<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('membership_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20)->unique();
            $table->string('description', 20)->nullable();
            $table->decimal('SubscriptionFee', 8, 2)->nullable();
            $table->decimal('application_fee', 8, 2)->nullable();
            $table->string('customer_nos', 250)->nullable();
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
        Schema::drop('membership_types');
    }
}
