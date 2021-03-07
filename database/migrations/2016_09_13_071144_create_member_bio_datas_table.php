<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberBioDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_bio_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Customer_No', 20)->nullable();
            $table->string('Other_Names', 30)->nullable();
            $table->dateTime('Date_Created')->nullable();
            $table->string('Application_Date')->nullable();
            $table->string('Surname', 30)->nullable();
            $table->string('Search_Name', 30)->nullable();
            $table->string('Status')->default(0);
            $table->string('Parent_Institution_Customer', 20)->nullable();
            $table->string('MemberShip_Type', 10)->nullable();;
            $table->string('Member_No', 20)->nullable();
            $table->string('Certificate_No', 20)->nullable();
            $table->dateTime('Date_Of_Birth')->nullable();
            $table->string('Gender')->nullable();;
            $table->string('Nationality', 20)->nullable();
            $table->string('ID_Number', 8)->unique();
            $table->string('PIN_Registration_No', 10)->nullable();;
            $table->string('Pass_Port_No', 20)->nullable();
            $table->string('Picture', 250)->nullable();
            $table->string('Country_Region_Code', 10)->nullable();
            $table->string('NavRecID')->nullable();
            $table->boolean('Conviction')->default(false);
            $table->string('Offence', 250)->nullable();
            $table->string('Date_and_Place', 250)->nullable();
            $table->string('Sentence', 250)->nullable();
            $table->string('Referee_Name', 50)->nullable();
            $table->string('Referee_Address', 250)->nullable();
            $table->string('Referee_Telephone', 250)->nullable();
            $table->string('Referee_Email', 250)->nullable();
            $table->string('E_mail', 250)->unique();
            $table->string('Mobile_No', 37)->nullable();
            $table->string('Phone_No', 37)->nullable();
            $table->string('Address', 37)->nullable();
            $table->string('Address_2', 37)->nullable();
            $table->string('City', 50)->nullable();
            $table->string('Post_Code', 20)->nullable();
            $table->string('County', 20)->nullable();
            $table->string('Home_Page', 60)->nullable();
            $table->string('Contact', 50)->nullable();
            $table->string('Fax_No', 30)->nullable();
            $table->string('Review_Recommendation', 250)->nullable();
            $table->dateTime('Review_Date')->nullable();
            $table->dateTime('Date_Of_Meeting')->nullable();
            $table->dateTime('Date_Sent_for_Approval')->nullable();
            $table->string('Subscription_Period', 10)->nullable();
            $table->dateTime('Certificate_Date')->nullable();
            $table->dateTime('Certificate_Time')->nullable();
            $table->string('Certificate_Generated_By', 20)->nullable();
            $table->dateTime('Membership_Date')->nullable();
            $table->dateTime('Last_Renewal_Date')->nullable();
            $table->string('Practitioner_License_No', 20)->nullable();
            $table->boolean('Synched_Web')->default(true);
            $table->dateTime('Last_TimeStamp')->nullable();
            $table->boolean('Synched_Nav')->default(false);
            $table->string('No', 20)->nullable();
            $table->boolean('Select')->default(true);
            $table->integer('Source')->default(0);
            $table->integer('Marital_Status')->default(0);
            $table->integer('user')->nullable();
            /******************************/
            $table->string('Current_Subscription_Period')->nullable();
            $table->string('No_Series')->nullable();
            $table->string('Applicaton_Subscription_Period')->nullable();
            $table->boolean('Certificate_Printed')->nullable();
            $table->boolean('Cert_No_Generated')->nullable();
            $table->dateTime('Certificate_Print_Date')->nullable();
            $table->boolean('Certificate_Collected')->nullable();
            $table->dateTime('Certificate_Collection_Date')->nullable();
            $table->string('Certificate_Collected_By')->nullable();
            $table->dateTime('Cert_No_Gen_Date')->nullable();
            $table->string('Cert_No_Gen_UserID')->nullable();
            $table->boolean('Hold_Cert')->nullable();
            $table->boolean('Institutional_Member')->default(false);
            $table->boolean('Individual_Member')->default(true);

            /*******************************/
            $table->boolean('Is_Company')->nullable()->default(false);
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
        Schema::drop('member_bio_datas');
    }
}
