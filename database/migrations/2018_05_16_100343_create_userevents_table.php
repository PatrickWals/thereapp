<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsereventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userevents', function (Blueprint $table) {
            $table->integer('User_ID')->unsigned();
            $table->foreign('User_ID')->references('User_ID')->on('users')->onDelete('cascade');;
            $table->integer('Event_ID')->unsigned();
            $table->foreign('Event_ID')->references('Event_ID')->on('events')->onDelete('cascade');;

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
        Schema::dropIfExists('userevents');
    }
}
