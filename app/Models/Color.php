<?php

namespace App\Models;

use App\Models\Traits\ColorRelationTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Support\EncryptableTrait;

class Color extends Model
{
    use HasFactory, EncryptableTrait, ColorRelationTraits;

    protected $table = 'colors';

    protected $fillable = [
        'name'
    ];

    protected array $encryptable = [
        'name'
    ];

    protected $hidden = ['deleted_at'];
}
