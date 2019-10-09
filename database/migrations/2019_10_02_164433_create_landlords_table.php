<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->unsignedBigInteger('cityId');
            $table->string('zip');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email');
            $table->string('note');
            $table->uuid('corporateRef');
            $table->timestamps();
        });

        Schema::table('landlords', function ($table) {
            $table->foreign('cityId')->references('id')->on('cities');
            $table->foreign('corporateRef')->references('uuid')->on('corporates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landlords');
    }
}
