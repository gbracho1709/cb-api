<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('planId');
            $table->integer('schemeId');
            $table->dateTime('started');
            $table->string('fee');
            $table->integer('corporateId');
            $table->timestamps();
        });

        Schema::table('fees', function ($table) {
            $table->foreign('planId')->references('id')->on('plans');
            $table->foreign('schemeId')->references('id')->on('schemes');
            $table->foreign('corporateId')->references('id')->on('corporations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
