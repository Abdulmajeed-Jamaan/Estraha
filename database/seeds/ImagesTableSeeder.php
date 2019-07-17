<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            Storage::putFileAs('public/img/', new File('public/img/' . $i . '.jpg'), $i . '.jpg');
        }


        // link images with homes randomly
        for ($b = 1; $b <= 10; $b++) {
            for ($i = 1; $i <= 15; $i++) {

                DB::table('images')->insert([
                    'file_name' => rand(1, 10) . '.jpg',
                    'home_id' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
