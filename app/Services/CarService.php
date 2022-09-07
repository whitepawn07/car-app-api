<?php

namespace App\Services;

use App\Models\CarColor;

trait CarService
{
    public function generateCarColorPayload($colors) {
        $carColors = [];
        foreach($colors as $color) {
            $carColor = new CarColor();
            $carColor->color_id = $color['color_id'];
            $carColors[] = $carColor;
        }

        return $carColors;
    }
}
