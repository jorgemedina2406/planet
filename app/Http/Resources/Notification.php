<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Property\Repositories\PropertyRepo;

class Notification extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $propertyRepo = new PropertyRepo();
        $property = $propertyRepo->getPropertyByIdTrashed($this->property_id);

        return [
            'id'         => $this->id,
            'usuario_id' => $this->user->id,
            'usuario'    => $this->user->name . ' ' . $this->user->lastname,
            'propiedad'  => $property->title,
            'tipo'       => $property->type_offer,
            'accion'     => $this->type,
            'imagen'     => $this->user->profile->image,
            'creado'     => $this->created_at,
        ];
    }
}
