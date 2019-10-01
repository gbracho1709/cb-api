<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial');
            $table->integer('licenseType');
            $table->integer('clientId');
            $table->dateTime('issueDate');
            $table->dateTime('DueDate');
            $table->timestamps();
        });

        Schema::table('licenses', function ($table) {
            $table->foreign('licenseType')->references('id')->on('licenses_types');
            $table->foreign('clientId')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}
