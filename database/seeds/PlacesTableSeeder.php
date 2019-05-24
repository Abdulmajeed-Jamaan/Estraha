<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ---------------- places in cities -----------------
        $places = [
            ['name' => 'الحسينية', 'city_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'العزيزية', 'city_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'الحوية', 'city_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('places')->insert($places);
    }
}
