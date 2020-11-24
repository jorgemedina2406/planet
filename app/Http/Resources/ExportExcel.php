<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product as ProductResource;

class ExportExcel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        foreach($this->products as $item) {
            \Log::debug('Producto',[$item->name]);
        }
        return [
            'reference'           => $this->reference,
            'courier'             => $this->courier,
            'date_notification'   => $this->date_notification,
            'mawb'                => $this->mawb,
            'hawb'                => $this->hawb,
            'line'                => $this->line,
            'flight'              => $this->flight,
            'date_flight'         => $this->date_flight,
            'cr'                  => $this->cr,
            'incoterm'            => $this->incoterm,
            'exporter'            => $this->exporter,
            'shipper'             => $this->shipper,
            'consignee'           => $this->consignee,
            'destination_country' => $this->destination_country,
            'airport'             => $this->airport,
            'nro_invoices'        => $this->nro_invoices,
            'date_invoices'       => $this->date_invoices,
            'products'            => ProductResource::collection($this->products)
        ];
    }
}
