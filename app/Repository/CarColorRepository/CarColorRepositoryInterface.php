<?php

namespace App\Repository\CarColorRepository;


use App\Models\Car;
use App\Models\CarColor;
use Illuminate\Http\Request;


interface CarColorRepositoryInterface
{
    public function update(Car $car, Request $request);
}
