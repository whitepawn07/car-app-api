<?php

namespace App\Models\Traits;

use App\Models\CarColor;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Models\Type;
use App\Models\User;

trait CarRelationTraits
{
    public function author() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function manufacturer() {
        return $this->hasOne(Manufacturer::class, 'id', 'manufacturer_id');
    }

    public function type() {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

//    public function colors() {
//        return $this->hasMany(CarColor::class);
//    }
    public function colors() {
        return $this->morphMany(CarColor::class,'car');
    }
}
