<?php

namespace Database\Factories;

use App\Models\Car;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        return [
            'name' => $this->faker->vehicle,
            'description' => $this->faker->paragraph(),
            'created_by' =>  $this->faker->numberBetween(1, 2),
            'type_id' =>  $this->faker->numberBetween(0, 50),
            'manufacturer_id' =>  $this->faker->numberBetween(0, 50)
        ];
    }
}
