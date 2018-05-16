<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinterests', function (Blueprint $table) {
            $table->integer('User_ID')->unsigned();
            $table->foreign('User_ID')->references('User_ID')->on('users')->onDelete('cascade');;
            $table->integer('Interest_ID')->unsigned();
            $table->foreign('Interest_ID')->references('Interest_ID')->on('interests')->onDelete('cascade');;
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
        Schema::dropIfExists('userinterests');
    }
}
