<?php

namespace Database\Factories;

use App\City;
use App\Photo;
use App\TouristObject;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;

class TouristObjectFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = TouristObject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->text(1000),
            'user_id' => User::query()
                ->inRandomOrder()
                ->whereHas(
                    'roles',
                    function (Builder $builder) {
                        $builder->where('name', 'owner');
                    }
                )
                ->first()->id,
            'city_id' => City::query()->inRandomOrder()->first()->id,
        ];
    }

    /**
     * @return TouristObjectFactory
     */
    public function configure(): TouristObjectFactory
    {
        return $this->afterCreating(function (TouristObject $touristObject) {
            $touristObject->photos()->save(Photo::factory()->make());
        });
    }
}
