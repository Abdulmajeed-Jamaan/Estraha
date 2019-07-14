<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class HomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['استراحة جديدة', 'استراحة واسعة', 'متوفر مسبح'];
        //--------------- create homes for owner users ----------------
        $faker = Faker::create();
        for ($i = 1; $i <= 15; $i++) {
            DB::table('homes')->insert([
                'title' => $titles[rand(0, 2)],
                'no_romes' => rand(1, 7),
                'no_baths' => rand(1, 7),
                'no_kitchen' => rand(1, 7),
                'area' => rand(1, 20) . ',' . rand(1, 20),
                'location' => '21.307798, 39.894787',
                'default_price' => rand(150, 600),
                'ramadan_price' => rand(150, 600),
                'hajj_price' => rand(150, 600),
                'user_id' => rand(1, 5),
                'place_id' => rand(1, 3),
                'created_at' => $faker->date,
                'updated_at' => $faker->date,

            ]);

            // -------------- adding extras to homes ----------
            if ($i <= 5) {
                DB::table('extra_home')->insert([
                    ['home_id' => $i, 'extra_id' => 1],
                    ['home_id' => $i, 'extra_id' => 2],
                    ['home_id' => $i, 'extra_id' => 3],
                ]);
            } elseif ($i >= 6 && $i <= 10) {
                DB::table('extra_home')->insert([
                    ['home_id' => $i, 'extra_id' => 2],
                ]);
            } else {
                DB::table('extra_home')->insert([
                    ['home_id' => $i, 'extra_id' => 1],
                ]);

            }
        }

    }
}
