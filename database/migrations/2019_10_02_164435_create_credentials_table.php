<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link');
            $table->string('user');
            $table->string('password');
            $table->string('pin');
            $table->string('other');
            $table->unsignedBigInteger('inputId');
            $table->uuid('corporateRef');
            $table->timestamps();
        });

        Schema::table('credentials', function ($table) {
            $table->foreign('inputId')->references('id')->on('credential_inputs');
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
        Schema::dropIfExists('credentials');
    }
}
