<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sharedholders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('securitySocial');
            $table->string('address');
            $table->unsignedInteger('cityId');
            $table->string('zip');
            $table->dateTime('birthDay');
            $table->integer('share');
            $table->string('email');
            $table->string('phone');
            $table->unsignedInteger('corporationId');
            $table->timestamps();
        });

        Schema::table('sharedholders', function ($table) {
            $table->foreign('cityId')->references('id')->on('cities');
            $table->foreign('corporationId')->references('id')->on('corporations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sharedholders');
    }
}
