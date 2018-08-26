<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_details', function (Blueprint $table) {
            $table->increments('ZoneDetails_ID');
            $table->timestamps();
            $table->integer('Zone_ID')->unsigned();
            $table->integer('NS_ID')->unsigned();

        });

        Schema::table('zone_details', function (Blueprint $table){
            $table->foreign('Zone_ID')
            ->references('Zone_ID')->on('zone_lists')
            ->onDelete('cascade');
        });

        Schema::table('zone_details', function (Blueprint $table){
            $table->foreign('NS_ID')
            ->references('NS_ID')->on('name_servers')
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
        Schema::dropIfExists('zone_details');
    }
}
