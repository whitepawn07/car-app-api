<?php

namespace App\Repository\CarColorRepository;

use App\Models\Car;
use App\Models\CarColor;
use Illuminate\Http\Request;

class EloquentCarColorRepository implements CarColorRepositoryInterface
{
    public function update(Car $car, Request $request)
    {
        $originColor = $car->colors->whereIn('id', collect($request['colors'])->pluck('id')->toArray() );

        foreach($request['colors'] as $colorValue) {
            $color = $originColor->where('id', $colorValue['id'])->first();
            if (isset($color)) {
                $color->color_id = $colorValue['color_id'];
                $color->update();
            }
        }
    }

}
