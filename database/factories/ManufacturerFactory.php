<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    protected $model = Manufacturer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        return [
            'name' => $this->faker->vehicleBrand
        ];
    }
}
