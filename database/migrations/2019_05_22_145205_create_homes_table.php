<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('no_romes');
            $table->integer('no_baths');
            $table->integer('no_kitchen');
            $table->string('area');
            $table->string('location')->nullable();
            $table->integer('default_price');
            $table->integer('ramadan_price');
            $table->integer('hajj_price');
            $table->softDeletes();

            // ------------------user (FK)----------------

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // ------------------place (FK)----------------

            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places');

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
        Schema::dropIfExists('homes');
    }
}