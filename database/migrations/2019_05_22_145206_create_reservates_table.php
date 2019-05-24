<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('attend_date');
            $table->date('leave_date');
            $table->integer('seen')->default(0);

            // ------------------user (FK)----------------

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // ------------------home (FK)----------------

            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')->references('id')->on('homes');

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
        Schema::dropIfExists('reservates');
    }
}
