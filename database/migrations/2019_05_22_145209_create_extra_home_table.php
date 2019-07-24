<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_home', function (Blueprint $table) {

            // ------------------extra (FK)----------------

            $table->unsignedBigInteger('extra_id');
            $table->foreign('extra_id')->references('id')->on('extras');

            // ------------------home (FK)----------------

            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');

            $table->primary(['extra_id', 'home_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_home');
    }
}