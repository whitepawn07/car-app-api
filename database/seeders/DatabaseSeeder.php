<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\ManufacturerSeeder;
use Database\Seeders\CarSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TypeSeeder::class,
            ColorSeeder::class,
            ManufacturerSeeder::class,
            CarSeeder::class,
            CarColorSeeder::class
        ]);
    }
}
