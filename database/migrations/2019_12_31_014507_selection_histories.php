<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SelectionHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selection_histories', function (Blueprint $table) {
            $table->string('selection_id', 13);
            $table->string('action_type', 50);
            $table->string('status', 50);
            $table->integer('order');
            $table->primary(['selection_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selection_histories');
    }
}
