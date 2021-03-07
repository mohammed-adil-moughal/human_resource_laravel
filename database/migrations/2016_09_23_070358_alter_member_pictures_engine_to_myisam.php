<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMemberPicturesEngineToMyisam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table('member_pictures', function(Blueprint $table){
            $sql = 'ALTER TABLE `member_pictures` ENGINE=MYISAM';
           DB::connection()->getPdo()->exec($sql);
        });*/
    }
    public function down()
    {
        /*
        Schema::table('member_pictures', function(Blueprint $table){
            $sql = 'ALTER TABLE `member_pictures` ENGINE=INNODB';
            DB::connection()->getPdo()->exec($sql);
        });*/
    }
}
