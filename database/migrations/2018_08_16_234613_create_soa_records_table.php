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
            $table->increments('id');
            $table->string('origin');
            $table->string('admin_email');
            $table->integer('serial_num');
            $table->integer('refresh_interval');
            $table->integer('retry_interval');
            $table->integer('expiry_interval');
            $table->integer('negative_ttl');

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
