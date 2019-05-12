<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineStations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_stations', function (Blueprint $table){
            $table->integer('line_id');
            $table->integer('station_id');
            $table->index(['line_id', 'station_id']);
            $table->unique(['line_id', 'station_id']);
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
        Schema::dropIfExists('line_stations');
    }
}
