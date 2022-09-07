<?php

namespace App\Models;

use App\Models\Traits\CarColorRelationTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    use HasFactory, CarColorRelationTraits;
}
