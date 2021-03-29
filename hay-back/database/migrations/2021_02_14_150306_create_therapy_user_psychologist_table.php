<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTherapyUserPsychologistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapy_user_psychologist', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('date');
            $table->string('image');
            $table->text('description_en');
            $table->text('description_ar');
            $table->UnsignedBigInteger('psychologist_id')->nullable();
            $table->foreign('psychologist_id')->references('id')->on('prsychologist')->onDelete('cascade');
            $table->UnsignedBigInteger('therapy_id')->nullable();
            $table->foreign('therapy_id')->references('id')->on('group_therapy')->onDelete('cascade');
            $table->UnsignedBigInteger('time_id')->nullable();
            $table->foreign('time_id')->references('id')->on('time')->onDelete('cascade');
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
        Schema::dropIfExists('therapy_user_psychologist');
        
    }
}
