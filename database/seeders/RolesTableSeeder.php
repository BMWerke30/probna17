<?php

namespace Database\Seeders;

use App\Role;
use Illuminate\Database\Seeder;

class
RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()
            ->insert(
                [
                    ['name' => 'owner'],
                    ['name' => 'tourist'],
                    ['name' => 'admin'],
                ]
            );
    }
}
