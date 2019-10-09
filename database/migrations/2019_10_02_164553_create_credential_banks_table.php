<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCredentialBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credential_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bankId');
            $table->string('link');
            $table->unsignedBigInteger('typeId');
            $table->string('user');
            $table->string('password');
            $table->string('routing');
            $table->string('account');
            $table->uuid('corporateRef');
            $table->timestamps();
        });

        Schema::table('credential_banks', function ($table) {
            $table->foreign('typeId')->references('id')->on('bank_accounts');
            $table->foreign('corporateRef')->references('uuid')->on('corporates');
            $table->foreign('bankId')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credential_banks');
    }
}
