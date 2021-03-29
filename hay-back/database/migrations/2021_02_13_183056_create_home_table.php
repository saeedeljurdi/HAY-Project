<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('missions_title_ar')->nullable();
            $table->text('missions_ar')->nullable();
            $table->string('missions_title_en')->nullable();
            $table->text('missions_en')->nullable();
            $table->string('visions_title_ar')->nullable();
            $table->text('visions_ar')->nullable();
            $table->string('visions_title_en')->nullable();
            $table->text('visions_en')->nullable();
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
        Schema::dropIfExists('home');
    }
}
