<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use App\Export\Entities\Export;
use App\Export\Entities\ProductsExports;
use App\Export\Entities\PermissionsExports;
use App\Export\Entities\ProtocolsExports;
use App\Export\Entities\CardsExports;
use App\Export\Entities\PedimentsExports;
use App\Pediment\Entities\Pediment;
use App\Protocol\Entities\Protocol;
use App\Tax\Entities\Tax;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Carbon\Carbon;

class ReportExports implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    use RegistersEventListeners;

    use Exportable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Export::all();
        $tax   = Tax::find(1);

        $query = Export::filters($this->data)->get();
        
        $results = collect();

        $all = [];

        foreach( $query as $export) {

            $all = [
                'reference'           => $export->reference,
                'courier'             => $export->courier->name,
                'date_notification'   => $export->date_notification,
                'mawb'                => $export->mawb,
                'hawb'                => $export->hawb,
                'line'                => $export->airline->name,
                'flight'              => $export->flight,
                'date_flight'         => $export->date_flight,
                'cr'                  => $export->cr->code,
                'incoterm'            => $export->incoterm->name,
                'exporter'            => $export->exporter->name,
                'shipper'             => $export->shippers->name,
                'consignee'           => $export->consignee->name,
                'destination_country' => $export->destination_country,
                'airport'             => $export->airport,
                'nro_invoices'        => $export->nro_invoices,
                'date_invoices'       => $export->date_invoices,
            ];

            $products = ProductsExports::select(\DB::raw('count(*) as num'))->groupBy('products_exports.export_id')->get();
                        
            if( count($export->products) < $products->max()->num )
            {
                foreach( $export->products as $key => $item ) {
                    $all['product_name_'.$key]     = $item->name;
                    $all['product_qty_'.$key]      = $item->pivot->qty;
                    $all['product_unid_'.$key]     = $item->pivot->unid;
                    $all['product_price_'.$key]    = $item->pivot->price;
                    $all['product_fraccion_'.$key] = $item->pivot->fraccion;
                }

                for ($i=1; $i <= ($products->max()->num - count($export->products))  ; $i++) { 
                    $all['product_name_'.$export->id.$i]     = '';
                    $all['product_qty_'.$export->id.$i]      = '';
                    $all['product_unid_'.$export->id.$i]     = '';
                    $all['product_price_'.$export->id.$i]    = '';
                    $all['product_fraccion_'.$export->id.$i] = '';
                }

            }else {
                foreach( $export->products as $key => $item ) {
                    $all['product_name_'.$export->id.$key]     = $item->name;
                    $all['product_qty_'.$export->id.$key]      = $item->pivot->qty;
                    $all['product_unid_'.$export->id.$key]     = $item->pivot->unid;
                    $all['product_price_'.$export->id.$key]    = $item->pivot->price;
                    $all['product_fraccion_'.$export->id.$key] = $item->pivot->fraccion;
                }
            }

            $protocols = ProtocolsExports::select(\DB::raw('count(*) as num'))->groupBy('protocols_exports.export_id')->get();

            if( count($export->protocols) < $protocols->max()->num )
            {

                foreach( $export->protocols as $key => $item ) {
                    $all['protocol_name_'.$key] = $item->name;
                }

                for ($i=1; $i <= ($protocols->max()->num - count($export->protocols))  ; $i++) {
                    $all['protocol_name_'.$export->id.$i] = '';
                }

            }else {
                foreach( $export->protocols as $key => $item ) {
                    $all['protocol_name_'.$export->id.$key] = $item->name;
                }
            }

            $permissions       = PermissionsExports::where('export_id', $export->id)->get();
            $permissions_count = PermissionsExports::select(\DB::raw('count(*) as num'))->groupBy('permissions_exports.export_id')->get();

            if( $permissions->count() < $permissions_count->max()->num )
            {

                foreach( $permissions as $key => $item ) {

                    $all['permits_'.$key]           = $item->permit;
                    $all['previous_balances_'.$key] = $item->previous_balance;
                    $all['permit_discharges_'.$key] = $item->permit_discharge;
                    $all['current_balances_'.$key]  = $item->current_balance;
                }

                for ($i=1; $i <= ($permissions_count->max()->num - count($permissions))  ; $i++) { 
                    $all['permit_'.$export->id.$i]           = '';        
                    $all['previous_balance_'.$export->id.$i] = '';
                    $all['permit_discharge_'.$export->id.$i] = '';
                    $all['current_balance_'.$export->id.$i]  = '';
                }


            }else {

                foreach( $permissions as $key => $item ) {
                    $all['permit_'.$export->id.$key]           = $item->permit;
                    $all['previous_balance_'.$export->id.$key] = $item->previous_balance;
                    $all['permit_discharge_'.$export->id.$key] = $item->permit_discharge;
                    $all['current_balance_'.$export->id.$key]  = $item->current_balance;
                }
            }

            $card = CardsExports::where('export_id', $export->id)->first();

            if( $card ) {
                $all['card_1'] = $card->card_one;
                $all['card_2'] = $card->card_two;
                $all['card_3'] = $card->card_three;
            }else{
                $all['card_1'] = '';
                $all['card_2'] = '';
                $all['card_3'] = '';
            }

            if( $export->patent ) {
                $all['patent'] = $export->patent->patent;
                $all['agent_aduanal'] = $export->patent->agent_aduanal;  
            }else{
                $all['patent'] = '';
                $all['agent_aduanal'] = '';  
            }  
            
            $pediments       = PedimentsExports::where('export_id', $export->id)->get();
            $pediment        = Pediment::all();
            $pediments_count = PedimentsExports::select(\DB::raw('count(*) as num'))->groupBy('pediments_exports.export_id')->get();
            
            foreach( $pediment as $llave => $pedi ) {

                if( $pediments->count() == 0 )
                {
                    $all['pediment_'.$pedi->id] = '';
                    $all['date_pay_'.$pedi->id] = '';
                }

                foreach( $pediments as $key => $item ) {
                    if( $item->pediment_id == $pedi->id ) {
                        $all['pediment_'.$pedi->id] = $item->nro_pediment;
                        $all['date_pay_'.$pedi->id] = $item->date_pay;
                        break;
                    }else{
                        $all['pediment_'.$pedi->id] = '';
                        $all['date_pay_'.$pedi->id] = '';
                    }
                }
            }

            $all['sample_reception_date']      = $export->sample_reception_date;
            $all['date_crossing_pediment']     = $export->date_crossing_pediment;
            if( $export->recognition ) {
                $all['recognition_id']         = $export->recognition->name;
            }else {
                $all['recognition_id']         = '';
            }
            $all['recognition_departure_time'] = $export->recognition_departure_time;
            $all['ige']                        = $tax->ige;
            $all['dta']                        = $tax->dta;
            $all['prv']                        = $tax->prv;
            $all['cnt']                        = $tax->cnt;

            $results->push($all);

        }

        return $results;
 
    }

    public function headings(): array
    {

        $info = [
            'Referencia',
            'Courier',
            'Fecha de notificacion',
            'Mawb',
            'Hawb',
            'Linea Aerea',
            'Numero de vuelo',
            'Fecha de vuelo',
            'CR',
            'Incoterm',
            'Exportador',
            'Shipper',
            'Consignatorio',
            'Pais destino',
            'Aeropuerto codigo IATA',
            'Nro facturas',
            'Fecha facturas'
        ];

        $products    = ProductsExports::select(\DB::raw('count(*) as num'))->groupBy('products_exports.export_id')->get();
        $permissions = PermissionsExports::select(\DB::raw('count(*) as num'))->groupBy('permissions_exports.export_id')->get();
        $pediments   = PedimentsExports::select(\DB::raw('count(*) as num'))->groupBy('pediments_exports.export_id')->get();
        $pediment    = Pediment::all();
        // $protocols   = ProtocolsExports::where('export_id', $export->id)->get();
        $protocols   = ProtocolsExports::select(\DB::raw('count(*) as num'))->groupBy('protocols_exports.export_id')->get();
        $protocol    = Protocol::find(1);

        for ($i=1; $i <= $products->max()->num ; $i++) {
            array_push($info, 'Producto');
            array_push($info, 'Cantidad');
            array_push($info, 'Unidad Factura');
            array_push($info, 'Valor Producto');
            array_push($info, 'Fraccion Arancelaria');
        }

        for ($i = 1; $i <= $protocols->max()->num; $i++)
        {
            array_push($info, 'Protocolo '.$i);
        }

        for ($i=1; $i <= $permissions->max()->num ; $i++) {
            array_push($info, 'Permiso '.$i);
            array_push($info, 'Saldo Anterior');
            array_push($info, 'Descargo de Permiso');
            array_push($info, 'Saldo Actual');
        }

        array_push($info, 'Carta 1');
        array_push($info, 'Carta 2');
        array_push($info, 'Carta 3');

        array_push($info, 'Patente');
        array_push($info, 'Agente Aduanal');

        foreach( $pediment as $item ){
            array_push($info, $item->pediment );
            array_push($info, 'Fecha Pago '.$item->pediment );
        }
        
        // for ($i=1; $i <= $pediments->max()->num ; $i++) {
        //     // array_push($info, $pediment->pediment->pediment );
        //     array_push($info, 'Pedimento' );
        //     // array_push($info, 'Fecha Pago '.$pediment->pediment->pediment);
        //     array_push($info, 'Fecha Pago');
        // }

        array_push($info, 'Fecha recepcion muestra');
        array_push($info, 'Fecha cruce pedimento');
        array_push($info, 'Reconocimiento aduanero');
        array_push($info, 'Hora de Salida de reconocimiento');
        array_push($info, 'IGE');
        array_push($info, 'DTA');
        array_push($info, 'PRV');
        array_push($info, 'CNT');

        

        return $info;

    }

    public static function afterSheet(AfterSheet $event)
    {
            $event->sheet->getDelegate()->getStyle('A1:'.$event->sheet->getDelegate()->getHighestColumn().'1')
            ->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('5867dd');

            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  13,
                    'bold'      =>  true,
                    'color'     => ['argb' => 'FFFFFF']
                ),
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ];

            $styleArrayCells = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ];
            
            $event->sheet->getDelegate()->getStyle('A1:'.$event->sheet->getDelegate()->getHighestColumn().'1')->applyFromArray($styleArray);
            $event->sheet->getDelegate()->getStyle('A2:'.$event->sheet->getDelegate()->getHighestColumn().$event->sheet->getDelegate()->getHighestRow())->applyFromArray($styleArrayCells);
            $event->sheet->getDelegate()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)->setPaperSize(PageSetup::PAPERSIZE_A3);

    }
}
