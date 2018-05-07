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
            $table->increments('User_ID');
            $table->string('username');
            $table->string('password');
            $table->string('Firstname')->nullable();
            $table->string('Lastname')->nullable();
            $table->string('email')->unique();
            $table->string('Phone')->nullable();
            $table->string('Mobile')->nullable();
            $table->integer('Status_ID');

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
