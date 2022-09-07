<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class AuthResource extends JsonResource
{

    private $data;
    public function __construct($resource = [], $data = [])
    {
        parent::__construct($resource);
        $this->data = $data;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user' => new AuthorResource($this->data['user']),
            'access_token' => $this->data['access_token'],
            'token_type' => $this->data['token_type']
        ];
    }
}
