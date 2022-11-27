<?php

namespace Database\Seeders;

use App\Photo;
use App\Role;
use App\User;
use Faker\Factory as Faker;
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
        $roles = Role::query()->get();

        // Admin
        User::factory()
            ->hasAttached($roles->where('name', 'admin')->first())
            ->create(
                [
                    'name' => 'Admin',
                    'password' => bcrypt('passwpassw'),
                ]
            );

        // Właściciele
        User::factory()
            ->count(5)
            ->hasAttached($roles->whereIn('name', ['owner', 'tourist']))
            ->create(
                [
                    'password' => bcrypt('passwpassw'),
                ]
            );
    }
}
