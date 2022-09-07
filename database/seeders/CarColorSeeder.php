<?php

namespace Database\Seeders;

use App\Models\CarColor;
use Illuminate\Database\Seeder;

class CarColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarColor::factory()->times(25)->create();
    }
}
