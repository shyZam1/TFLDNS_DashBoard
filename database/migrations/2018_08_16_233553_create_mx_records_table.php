<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMxRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mx_records', function (Blueprint $table) {
            $table->increments('MX_ID');
            $table->string('value');
             //define foreign key
            $table->integer('ZoneDetails_ID')->unsigned();
            
        });

        Schema::table('mx_records', function (Blueprint $table){
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
        Schema::dropIfExists('mx_records');
    }
}
