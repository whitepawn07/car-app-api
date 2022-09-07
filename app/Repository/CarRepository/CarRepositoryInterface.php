<?php

namespace App\Repository\CarRepository;

use App\Http\FormRequest\CarRequest\CarBaseRequest;
use App\Models\Car;
use Illuminate\Http\Request;


interface CarRepositoryInterface
{
    public function index(Request $request);
    public function show(Car $car);
    public function store(CarBaseRequest $request);
    public function update(Car $car, CarBaseRequest $request);
    public function destroy(Car $car);
}
