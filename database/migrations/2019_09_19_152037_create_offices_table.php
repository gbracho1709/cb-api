<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('dba');
            $table->string('phone');
            $table->string('fax');
            $table->string('ein');
            $table->string('address');
            $table->integer('cityId');
            $table->string('zip');
            $table->timestamps();
        });

        Schema::table('offices', function ($table) {
            $table->foreign('cityId')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
