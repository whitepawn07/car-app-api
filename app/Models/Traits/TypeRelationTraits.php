<?php

namespace App\Models\Traits;

use App\Models\Car;

trait TypeRelationTraits
{
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
