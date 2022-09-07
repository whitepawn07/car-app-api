<?php

namespace App\Models;

use App\Models\Traits\ManufacturerRelationTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Support\EncryptableTrait;

class Manufacturer extends Model
{
    use HasFactory, EncryptableTrait, ManufacturerRelationTraits;

    protected $table = 'manufacturers';

    protected $fillable = [
        'name'
    ];

    protected array $encryptable = [
      'name'
    ];
}
