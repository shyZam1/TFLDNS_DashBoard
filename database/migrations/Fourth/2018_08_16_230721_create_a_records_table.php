<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateARecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_records', function (Blueprint $table) {
            $table->increments('A_ID');
            $table->ipAddress('value');
            //define foreign key
            $table->integer('ZoneDetails_ID')->unsigned();
            
        });

        Schema::table('a_records', function (Blueprint $table){
            $table->foreign('ZoneDetails_ID')
            ->references('ZoneDetails_ID')->on('zone_details')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_records');
    }
}
