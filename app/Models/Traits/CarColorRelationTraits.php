<?php

namespace App\Models\Traits;

use App\Models\Car;
use App\Models\Color;

trait CarColorRelationTraits
{
//    public function car() {
//        return $this->belongsTo(Car::class);
//    }
    public function car() {
        return $this->morphTo();
    }

    public function color() {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
}
