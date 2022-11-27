<?php

namespace Database\Factories;

use App\Reservation;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $role = Role::query()->where('name', 'tourist')->first();

        return [
            'user_id' => User::factory()
                ->hasAttached($role)
                ->create(
                    [
                        'password' => bcrypt('passwpassw'),
                    ]
                ),
            'status' => $this->faker->boolean(50),
            'day_in' => $this->faker->dateTimeBetween('-10 days', 'now'),
            'day_out' => $this->faker->dateTimeBetween('now', '+10 days'),
        ];
    }
}
