<?php

namespace Database\Seeders;

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
        $this->call(RolesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TouristObjectsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(LikeablesTableSeeder::class);
    }
}
