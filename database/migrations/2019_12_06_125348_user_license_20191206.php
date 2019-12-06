<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLicense20191206 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_license', function (Blueprint $table) {
            $table->string('type')->after('license_id');
            $table->primary(['user_id', 'license_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_license', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
