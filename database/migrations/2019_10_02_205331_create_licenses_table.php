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
            $table->integer('licenseTypeId');
            $table->integer('corporationId');
            $table->dateTime('issueDate');
            $table->dateTime('dueDate');
            $table->string('observation');
            $table->timestamps();
        });

        Schema::table('licenses', function ($table) {
            $table->foreign('licenseTypeId')->references('id')->on('licenses_types');
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
        Schema::dropIfExists('licenses');
    }
}
