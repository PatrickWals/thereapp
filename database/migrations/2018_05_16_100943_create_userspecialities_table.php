<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserspecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userspecilities', function (Blueprint $table) {
            $table->integer('User_ID')->unsigned();
            $table->foreign('User_ID')->references('User_ID')->on('users')->onDelete('cascade');;
            $table->integer('Speciality_ID')->unsigned();
            $table->foreign('Speciality_ID')->references('Speciality_ID')->on('specialities')->onDelete('cascade');
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
        Schema::dropIfExists('userspecilities');
    }
}
