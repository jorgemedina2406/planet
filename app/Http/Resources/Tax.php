<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tax extends JsonResource
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
            'id'  => $this->id,
            'ige' => $this->ige,
            'dta' => $this->dta,
            'prv' => $this->prv,
            'cnt' => $this->cnt,
            'total'  => $this->count()
        ];
    }
}
