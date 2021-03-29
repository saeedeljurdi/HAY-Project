<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsessionssUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supportsessionss__user', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->UnsignedBigInteger('support_session_id')->nullable();
            $table->foreign('support_session_id')->references('id')->on('support_session_ss')->onDelete('cascade');
            $table->unique(['support_session_id', 'user_id']);
            $table->UnsignedBigInteger('time_ss_id')->nullable();
            $table->foreign('time_ss_id')->references('id')->on('time_ss')->onDelete('cascade');
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
        Schema::dropIfExists('supportsessionss__user');
    }
}
