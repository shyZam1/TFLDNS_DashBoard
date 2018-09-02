<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_lists', function (Blueprint $table) {
            $table->increments('Zone_ID');
            $table->string('subdomain');
            $table->integer('TopDomain_ID')->unsigned();
        });

        Schema::table('zone_lists', function (Blueprint $table){
            $table->foreign('TopDomain_ID')
            ->references('TopDomain_ID')->on('tld_lists')
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
        Schema::dropIfExists('zone_lists');
    }
}
