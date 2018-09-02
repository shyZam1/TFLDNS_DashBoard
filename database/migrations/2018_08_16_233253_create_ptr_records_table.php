<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtrRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptr_records', function (Blueprint $table) {
            $table->increments('PTR_ID');
            $table->string('value');
             //define foreign key
            $table->integer('ZoneDetails_ID')->unsigned();
            
        });

        Schema::table('ptr_records', function (Blueprint $table){
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
        Schema::dropIfExists('ptr_records');
    }
}
