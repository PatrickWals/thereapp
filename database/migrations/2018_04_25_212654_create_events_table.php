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
            $table->date('Eventdate');
            $table->integer('Category_ID');
            $table->integer('Owner_ID')->unsigned();
            $table->foreign('Owner_ID')->references('User_ID')->on('users');
            $table->longtext('description');
            
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
