<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user');
            $table->integer('office');
            $table->integer('owner');
            $table->timestamps();
        });

        Schema::table('offices_users', function ($table) {
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('office')->references('id')->on('offices');
            $table->foreign('owner')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices_users');
    }
}
