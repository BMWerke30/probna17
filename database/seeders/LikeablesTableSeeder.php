<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');

        for ($i = 1; $i <= 40; $i++) {
            DB::table('likeables')->insert([
                'likeable_type' => $faker->randomElement(['App\TouristObject']),
                'likeable_id' => $faker->numberBetween(1, 10),
                'user_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
