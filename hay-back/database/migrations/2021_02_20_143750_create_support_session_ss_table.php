<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportSessionSsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_session_ss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('date');
            $table->string('image');
            $table->text('description_en');
            $table->text('description_ar');
            $table->UnsignedBigInteger('support_group_id')->nullable();
            $table->foreign('support_group_id')->references('id')->on('support_group');
            $table->UnsignedBigInteger('psychologist_id')->nullable();
            $table->foreign('psychologist_id')->references('id')->on('prsychologist');
            $table->UnsignedBigInteger('time_ss_id')->nullable();
            $table->foreign('time_ss_id')->references('id')->on('time_ss');
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
        Schema::dropIfExists('support_session_ss');
    }
}
