<?php

namespace App\Models;

use App\Models\Traits\TypeRelationTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Support\EncryptableTrait;

class Type extends Model
{
    use HasFactory, EncryptableTrait, TypeRelationTraits;

    protected  $table = 'types';

    protected  $fillable = [
        'name'
    ];

    protected array $encryptable = [
        'name'
    ];
}
