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
            $table->string('descriptionId');
            $table->string('typeId');
            $table->timestamps();
        });

        Schema::table('credentials', function ($table) {
            $table->foreign('descriptionId')->references('id')->on('descriptions');
            $table->foreign('typeId')->references('id')->on('type_credentials');
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
