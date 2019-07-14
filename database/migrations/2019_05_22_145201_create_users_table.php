<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            // ------------------Role (FK)----------------

            //default(1) = = is the role id of normal user
            $table->unsignedBigInteger('role_id')->default(1);
            $table->foreign('role_id')->references('id')->on('roles');

            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // ---------------- Creating default admin user ------------------
        $admin = [
            ['name' => 'المدير', 'role_id' => 3, 'email' => 'admin@admin.com', 'phone' => '0551245093', 'password' => Hash::make('admin'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        // ----------------- Insert Values into Database. ------------------------------
        DB::table('users')->insert($admin);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
