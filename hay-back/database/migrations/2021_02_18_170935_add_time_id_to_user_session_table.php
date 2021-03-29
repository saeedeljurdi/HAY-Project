<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeIdToUserSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_session', function (Blueprint $table) {
            $table->UnsignedBigInteger('time_id')->nullable();
            $table->foreign('time_id')->references('id')->on('time')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_session', function (Blueprint $table) {
            //
        });
    }
}
