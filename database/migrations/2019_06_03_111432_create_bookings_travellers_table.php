<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTravellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings_travellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('booking_id');
            $table->string('nume');
            $table->string('prenume');
            $table->date('dob'); //date of birth
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
        Schema::dropIfExists('bookings_travellers');
    }
}
