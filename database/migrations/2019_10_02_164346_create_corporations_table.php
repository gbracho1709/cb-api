<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('website');
            $table->string('phone');
            $table->string('fax');
            $table->integer('cityId');
            $table->string('zip');
            $table->integer('clasificationId');
            $table->dateTime('started');
            $table->dateTime('incorporate');
            $table->dateTime('fiscalYear');
            $table->string('certification');
            $table->string('federal');
            $table->timestamps();
        });

        Schema::table('corporations', function ($table) {
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
