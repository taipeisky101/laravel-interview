<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        for ($i=0; $i<10; $i++) {
            // $tz_object = new DateTimeZone('PST');
            // $datetime = new DateTime();
            // $datetime->setTimezone($tz_object);

            DB::table('customers')->insert([
                'name' => Str::random(10),
                'fund' => rand(1, 20)*100,
                // 'created_at' => $datetime->format('Y-m-d h:i:s'),
                'created_at' => now('PST'),
                'updated_at' => now('PST'),
            ]);
        }

        $faker = Faker::create();

        for ($i=0; $i<10; $i++) {
            DB::table('Users')->insert([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now('PST'),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now('PST'),
                'updated_at' => now('PST'),
            ]);
        }
    }
}
