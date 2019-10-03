<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('website');
            $table->string('phone');
            $table->string('fax');
            $table->unsignedBigInteger('cityId');
            $table->string('zip');
            $table->unsignedBigInteger('clasificationId');
            $table->dateTime('started');
            $table->dateTime('incorporate');
            $table->dateTime('fiscalYear');
            $table->string('certification');
            $table->string('federal');
            $table->timestamps();
        });

        Schema::table('corporates', function ($table) {
            $table->foreign('cityId')->references('id')->on('cities');
            $table->foreign('clasificationId')->references('id')->on('clasifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporations');
    }
}
