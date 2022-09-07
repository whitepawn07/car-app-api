<?php

namespace App\Models\Traits;

use App\Models\Car;

trait UserRelationTraits
{
    public function cars() {
        return $this->hasMany(Car::class);
    }
}
