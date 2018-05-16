<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('Event_ID');
            $table->string('Eventname');
            $table->integer('Reservation_ID')->unsigned();
            $table->foreign('Reservation_ID')->references('Reservation_ID')->on('reservations')->onDelete('cascade');
            $table->integer('Category_ID');
            $table->integer('Owner_ID')->unsigned();
            $table->foreign('Owner_ID')->references('User_ID')->on('users')->onDelete('cascade');;
            $table->longtext('Description');
            
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
        Schema::dropIfExists('events');
    }
}