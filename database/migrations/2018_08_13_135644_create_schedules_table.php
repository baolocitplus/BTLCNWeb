<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->nullable();
            $table->date('timestart')->nullable();
            $table->date('timeend')->nullable();
            $table->timestamp('hourstart')->nullable();
            $table->integer('staff_id')->nullable();
            $table->double('adultprice')->nullable();
            $table->double('childprice')->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
