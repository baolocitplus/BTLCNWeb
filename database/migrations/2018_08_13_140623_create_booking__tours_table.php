<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking__tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('tour_id')->nullable();
            $table->string('pickplace')->nullable();
            $table->integer('adultnumber')->nullable();
            $table->integer('childnumber')->nullable();
            $table->timestamp('timestart')->nullable();
            $table->double('totalprice')->nullable();
            $table->string('status')->nullable();
            $table->string('private_qr')->nullable();
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
        Schema::dropIfExists('booking__tours');
    }
}
