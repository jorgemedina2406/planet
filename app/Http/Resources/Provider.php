<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Provider extends JsonResource
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
            'name'           => $this->name,
            'street'         => $this->street,
            'nro_ext'        => $this->nro_ext,
            'nro_int'        => $this->nro_int,
            'colony'         => $this->colony,
            'municipality'   => $this->municipality,
            'federal_entity' => $this->federal_entity,
            'postal'         => $this->postal,
            'country'        => $this->country->name,
        ];
    }
}
