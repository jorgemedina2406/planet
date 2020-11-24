<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Patent extends JsonResource
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
            'id'            => $this->id,
            'patent'        => $this->patent,
            'agent_aduanal' => $this->agent_aduanal,
            'status'        => $this->status,
            'total'         => $this->count()
        ];
    }
}
