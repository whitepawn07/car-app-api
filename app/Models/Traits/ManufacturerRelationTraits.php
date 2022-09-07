<?php

namespace App\Models\Traits;

use App\Models\Car;

trait ManufacturerRelationTraits
{
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
