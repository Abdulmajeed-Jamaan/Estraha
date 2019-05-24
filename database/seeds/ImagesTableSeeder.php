<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // link images with homes randomly
        for ($b = 1; $b <= 5; $b++) {
            for ($i = 1; $i <= 15; $i++) {

                DB::table('images')->insert([
                    'file_name' => rand(1, 5) . '.jpg',
                    'home_id' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

    }
}
