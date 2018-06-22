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

            $table->integer('Reservation_ID');
            $table->string('Eventname');
            $table->longtext('Description');
            $table->string('Event_link')->nullable();
            $table->string('Event_status');
            $table->string('Event_pic')->nullable();
            $table->string('Futurelab_Str');
            $table->integer('Owner_ID')->unsigned();
            $table->foreign('Owner_ID')->references('User_ID')->on('users')->onDelete('cascade');;
            
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
