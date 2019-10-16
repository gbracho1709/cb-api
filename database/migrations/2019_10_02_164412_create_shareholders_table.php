<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title');
            $table->string('securitySocial');
            $table->string('address');
            $table->unsignedBigInteger('cityId');
            $table->string('zip');
            $table->dateTime('birthDay');
            $table->integer('share');
            $table->string('email');
            $table->string('phone');
            $table->uuid('reference');
            $table->timestamps();
        });

        Schema::table('shareholders', function ($table) {
            $table->foreign('cityId')->references('id')->on('cities');
            $table->foreign('reference')->references('uuid')->on('corporates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shareholders');
    }
}
