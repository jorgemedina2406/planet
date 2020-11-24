<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Import extends JsonResource
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
            'reference'         => $this->reference,
            'courier'           => $this->courier->name,
            'dateNotification'  => $this->date_notification,
            'mawb'              => $this->mawb,
            'hawb'              => $this->hawb,
            'line'              => $this->airline->name,
            'flight'            => $this->flight,
            'importer'          => $this->importer->name,
            'product'           => $this->product,
            'total'             => $this->total,
            'status_id'         => $this->status_id,
            'totalCount'        => $this->count()
        ];
    }
}
