<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'code'        => $this->code,
            'description' => $this->description,
            'provider'    => $this->provider,
            'unid'        => $this->unid,
            'qty'         => $this->qty,
            'price'       => $this->price,
            'status'      => $this->status,
            'total'       => $this->count()
        ];
    }
}
