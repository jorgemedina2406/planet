<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Consolidated extends JsonResource
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
            'id'                => $this->id,
            'des'               => $this->des,
            'guie'              => $this->guie,
            'hawbs'             => $this->hawbs,
            'hawbs_delivered'   => $this->hawbs_delivered,
            'hawns_planet'      => $this->hawns_planet,
            'date_notification' => $this->date_notification,
            'courier'           => $this->courier->name,
            'total'             => $this->count()
        ];
    }
}
