<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('comments')->insert([
                'content' => $faker->text(500),
                'rating' => $faker->numberBetween(1, 5),
                'user_id' => $faker->numberBetween(1, 10),
                'commentable_type' => $faker->randomElement(['App\TouristObject']),
                'commentable_id' => $faker->numberBetween(1, 10),

            ]);
        }
    }
}
