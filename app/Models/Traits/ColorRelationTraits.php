<?php

namespace App\Models\Traits;

use App\Models\Car;
use App\Models\CarColor;

trait ColorRelationTraits
{
    public function car() {
        return $this->belongsTo(Car::class);
    }

    public function carColor() {
        return $this->belongsTo(CarColor::class);
    }
}
