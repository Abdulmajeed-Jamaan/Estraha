<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReservatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //------------------- create random reservates for customers users --------------------
        for ($i = 6; $i <= 10; $i++) {

            DB::table('reservates')->insert([
                'attend_date' => Carbon::create(2019, 1, $i),
                'leave_date' => Carbon::create(2019, 1, $i + 10),
                'user_id' => $i,
                'home_id' => rand(1, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }
}
