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
            $table->integer('descriptionId');
            $table->integer('typeId');
            $table->integer('corporationId');
            $table->timestamps();
        });

        Schema::table('credentials', function ($table) {
            $table->foreign('descriptionId')->references('id')->on('descriptions');
            $table->foreign('typeId')->references('id')->on('type_credentials');
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
        Schema::dropIfExists('credentials');
    }
}
