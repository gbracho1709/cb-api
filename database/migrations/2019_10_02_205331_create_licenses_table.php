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
            $table->unsignedBigInteger('licenseTypeId');
            $table->unsignedBigInteger('corporateId');
            $table->dateTime('issueDate');
            $table->dateTime('dueDate');
            $table->string('observation');
            $table->timestamps();
        });

        Schema::table('licenses', function ($table) {
            $table->foreign('licenseTypeId')->references('id')->on('license_types');
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
        Schema::dropIfExists('licenses');
    }
}
