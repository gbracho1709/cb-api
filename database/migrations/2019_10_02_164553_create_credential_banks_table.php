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
            $table->unsignedBigInteger('typeCredentialId');
            $table->string('user');
            $table->string('password');
            $table->string('routing');
            $table->string('account');
            $table->unsignedBigInteger('corporationId');
            $table->timestamps();
        });

        Schema::table('credential_banks', function ($table) {
            $table->foreign('typeCredentialId')->references('id')->on('type_credentials');
            $table->foreign('corporationId')->references('id')->on('corporations');
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
