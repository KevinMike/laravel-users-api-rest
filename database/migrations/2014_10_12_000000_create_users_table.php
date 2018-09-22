<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellidopat')->nullable();
            $table->string('apellidomat')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->dateTime('fchnac')->nullable();
            $table->dateTime('fchingreso')->nullable();
            $table->string('avatar')->default('https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/128.jpg');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
