<?php

namespace App\Http\FormRequest\CarRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CarCreateRequest extends CarBaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        parent::rules();
        return [
            'name' => 'required|string|max:255',
            'type_id' => 'required|int',
            'manufacturer_id' => 'required|int',
            'colors' => 'required|array',
        ];
    }
}
