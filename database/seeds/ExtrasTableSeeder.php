<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //----------------- adding some extras ------------------
        $extras = [
            ['name' => 'مسبح', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'شاشات', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'بيت شعر', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('extras')->insert($extras);

    }
}
