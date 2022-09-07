<?php

namespace App\Models;

use App\Models\Traits\CarRelationTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Support\EncryptableTrait;

class Car extends Model
{
    use HasFactory, EncryptableTrait, CarRelationTraits;

    /**
     * @var string
     */
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'type_id',
        'manufacturer_id',
        'color_id'
    ];

    /**
     * @var array|string[]
     */
    protected array $encryptable = [
        'name',
        'description'
    ];
}
