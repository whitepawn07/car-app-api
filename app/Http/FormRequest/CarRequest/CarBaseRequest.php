<?php

namespace App\Http\FormRequest\CarRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\FormRequest\CarRequest\CarRequestInterface;

class CarBaseRequest extends FormRequest
{
    private array $createRules = [
        'name' => 'required|string|max:255',
        'type_id' => 'required|int',
        'manufacturer_id' => 'required|int',
        'colors' => 'required|array',
    ];

    private array $updateRules = [
        'name' => 'sometimes|string|max:255',
        'type_id' => 'sometimes|int',
        'manufacturer_id' => 'sometimes|int',
        'colors' => 'sometimes|array',
        'new_colors.*.color_id' => 'unique:car_colors,color_id'
    ];
    /**
     * @return string[]
     */
    public function rules()
    {
        if (request()->isMethod('post')) {
            return $this->createRules;
        }

        return $this->updateRules;
    }

    /**
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'new_colors.*.color_id.unique' => "The new color id added has already been taken."
        ];
    }
}
