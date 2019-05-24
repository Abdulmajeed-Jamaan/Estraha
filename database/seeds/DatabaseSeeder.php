<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // --------------------- feed the database with data in order ----------------
        $this->call(UsersTableSeeder::class);

        $this->call(CitiesTableSeeder::class);

        $this->call(PlacesTableSeeder::class);

        $this->call(ExtrasTableSeeder::class);

        $this->call(HomesTableSeeder::class);

        $this->call(ImagesTableSeeder::class);

        $this->call(ReservatesTableSeeder::class);

    }
}
