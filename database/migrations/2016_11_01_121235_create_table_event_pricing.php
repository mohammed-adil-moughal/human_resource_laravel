<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEventPricing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_pricings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('Training_Event_Code')->nullable();
            $table->integer('Membership_Type')->nullable();
            $table->decimal('Early_Bird_Price', 10, 2)->nullable();
            $table->decimal('Early_Bird_Discount', 10, 2)->nullable();
            $table->decimal('Regular_Price', 10, 2)->nullable();
            $table->decimal('Regular_Price_Discount', 10, 2)->nullable();
            $table->boolean('Inclusive_of_VAT')->nullable();
            $table->dateTime('Early_Bird_CutOff_Date')->nullable();
            $table->decimal('Total_Collected', 10, 2)->nullable();
            $table->decimal('Total_Billed', 10, 2)->nullable();
            $table->string('Currency')->nullable();
            $table->timestamps();
            $table->unique(array('Training_Event_Code', 'Membership_Type'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('event_pricings');
    }
}
