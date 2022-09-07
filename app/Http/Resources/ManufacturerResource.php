<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => [
                'timestamp' => Carbon::parse($this->created_at)->getTimestamp()
            ],
            'updated_at' => [
                'timestamp' => Carbon::parse($this->updated_at)->getTimestamp()
            ]
        ];
    }
}
