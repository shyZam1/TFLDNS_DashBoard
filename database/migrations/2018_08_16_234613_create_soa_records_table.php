<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoaRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soa_records', function (Blueprint $table) {
            $table->increments('SOA_ID');
            $table->string('origin');
            $table->string('admin_email');
            $table->integer('serial_num');
            $table->integer('refresh_interval');
            $table->integer('retry_interval');
            $table->integer('expiry_interval');
            $table->integer('negative_ttl');
             //define foreign key
            $table->integer('ZoneDetails_ID')->unsigned();
            

        });

        Schema::table('soa_records', function (Blueprint $table){
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
        Schema::dropIfExists('soa_records');
    }
}
