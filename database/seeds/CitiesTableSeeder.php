<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------------------- adding cities in the database -----------------
        $cities = [
            ['name' => 'مكة', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'جدة', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'طائف', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('cities')->insert($cities);

    }
}
