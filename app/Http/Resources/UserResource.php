<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'email'=>$this->email,
            'username'=>$this->name,
            'pass'=>Hash::check(1234561,$this->password),
            'type'=>$this->type,
            'active'=>$this->active
        ];
    }
}
