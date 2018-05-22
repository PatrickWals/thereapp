<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('Reservation_ID');
            $table->integer('User_ID')->unsigned();
            $table->foreign('User_ID')->references('user_ID')->on('users')->onDelete('cascade');
            $table->integer('Room_ID')->unsigned();
            $table->foreign('Room_ID')->references('Room_ID')->on('rooms')->onDelete('cascade');
            $table->date('Start_date');
            $table->date('End_date');
            $table->float('PriceReservation');
            $table->string('Reservation_status');
            $table->longtext('Reservation_remarks');

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
        Schema::dropIfExists('reservations');
    }
}
