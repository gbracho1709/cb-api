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
            $table->unsignedBigInteger('typeId');
            $table->unsignedBigInteger('corporateId');
            $table->timestamps();
        });

        Schema::table('credentials', function ($table) {
            $table->foreign('inputId')->references('id')->on('credential_inputs');
            $table->foreign('typeId')->references('id')->on('bank_accounts');
            $table->foreign('corporateId')->references('id')->on('corporates');
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
