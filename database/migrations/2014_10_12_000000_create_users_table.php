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
            $table->string('Username')->nullable();
            $table->string('Password');
            $table->string('Firstname')->nullable();
            $table->string('Lastname')->nullable();
            $table->string('Email')->unique();
            $table->string('Phone')->nullable();
            $table->string('Mobile')->nullable();
<<<<<<< HEAD
            $table->string('Futurelab_Str')->nullable();
            $table->string('Profile_Pic')->nullable();
=======
            $table->string('Profile_pic')->nullable();
>>>>>>> reservationS2.1
            $table->string('Status_Str');
            $table->string('Aboutme_Str')->nullable();
            
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
