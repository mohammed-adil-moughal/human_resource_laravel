<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAcademicAttachmentsEngineToMyisam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table('academic_attachments', function(Blueprint $table){
            $sql = 'ALTER TABLE `academic_attachments` ENGINE=MYISAM';
            DB::connection()->getPdo()->exec($sql);
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('academic_attachments', function(Blueprint $table){
            $sql = 'ALTER TABLE `academic_attachments` ENGINE=INNODB';
            DB::connection()->getPdo()->exec($sql);
        });*/
    }
}
