<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $firstnames = ['احمد', 'علي', 'خالد', 'سعد', 'عمر'];
        $secondtnames = ['منصور', 'محمد', 'طلال', 'جمعان', 'عبدالله'];

        // ----------------- generating random users ------------------

        for ($i = 1; $i <= 10; $i++) {

            $name = $firstnames[rand(0, 4)] . ' ' . $secondtnames[rand(0, 4)];

            $role_id = 0;

            if ($i <= 5) {
                $role_id = 2;
            } else {
                $role_id = 1;
            }

            DB::table('users')->insert([
                'name' => $name,
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $role_id,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
