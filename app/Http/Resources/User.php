<?php

namespace App\Http\Resources;

use App\Profile\Entities\Profile;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Profile as ProfileResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [

            'id'             => $this->id,
            'email'          => $this->email,
            'status'         => $this->activated,
            'name'           => $this->profile->name,
            'lastname'       => $this->profile->lastname,
            'street'         => $this->profile->street,
            'nro_ext'        => $this->profile->nro_ext,
            'nro_int'        => $this->profile->nro_int, 
            'colony'         => $this->profile->colony,  
            'municipality'   => $this->profile->municipality,
            'federal_entity' => $this->profile->federal_entity,
            'postal'         => $this->profile->postal,     
            'movil'          => $this->profile->mobile_phone,
            'phone'          => $this->profile->phone,
            'role'           => $this->role,

        ];
    }
}
