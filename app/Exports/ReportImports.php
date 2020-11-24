<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use App\Import\Entities\Import;
use App\Import\Entities\ProductsImports;
use App\Import\Entities\PermissionsImports;
use App\Import\Entities\ProtocolsImports;
use App\Import\Entities\CardsImports;
use App\Import\Entities\PedimentsImports;
use App\Pediment\Entities\Pediment;
use App\Protocol\Entities\Protocol;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Carbon\Carbon;

class ReportImports implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
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
        $query = Import::all();

        $query = Import::filters($this->data)->get();
        
        $results = collect();

        $all = [];

        foreach( $query as $import) {

            $all = [
                'reference'           => 'AIR'.date('y').$import->reference,
                'courier'             => $import->courier->name,
                'date_notification'   => $import->date_notification,
                'mawb'                => $import->mawb,
                'hawb'                => $import->hawb,
                'line'                => $import->airline->name,
                'cr'                  => $import->cr->code,
                'incoterm'            => $import->incoterm->name,
                'importer'            => $import->importer->name,
                'provider'            => $import->provider->name,
                'consignee'           => $import->consignee->name,
                'destination_country' => $import->country->name,
                'airport'             => $import->airport,
                'nro_invoices'        => $import->nro_invoices,
                'date_invoices'       => $import->date_invoices,
            ];

            $products = ProductsImports::select(\DB::raw('count(*) as num'))->groupBy('products_imports.import_id')->get();

            if( count($import->products) < $products->max()->num )
            {
                foreach( $import->products as $key => $item ) {
                    $all['product_name_'.$key]     = $item->name;
                    $all['product_qty_'.$key]      = $item->pivot->qty;
                    $all['product_unid_'.$key]     = $item->pivot->unid;
                    $all['product_price_'.$key]    = $item->pivot->price;
                    $all['product_fraccion_'.$key] = $item->pivot->fraccion;
                }

                for ($i=1; $i <= ($products->max()->num - count($import->products))  ; $i++) { 
                    $all['product_name'.$import->id.$i]     = '';
                    $all['product_qty'.$import->id.$i]      = '';
                    $all['product_unid'.$import->id.$i]     = '';
                    $all['product_price'.$import->id.$i]    = '';
                    $all['product_fraccion'.$import->id.$i] = '';
                }

            }else {
                foreach( $import->products as $key => $item ) {
                    $all['product_name_'.$import->id.$key]     = $item->name;
                    $all['product_qty_'.$import->id.$key]      = $item->pivot->qty;
                    $all['product_unid_'.$import->id.$key]     = $item->pivot->unid;
                    $all['product_price_'.$import->id.$key]    = $item->pivot->price;
                    $all['product_fraccion_'.$import->id.$key] = $item->pivot->fraccion;
                }
            }

            $protocols = ProtocolsImports::select(\DB::raw('count(*) as num'))->groupBy('protocols_imports.import_id')->get();

            if( count($import->protocols) < $protocols->max()->num )
            {
                foreach( $import->protocols as $key => $item ) {
                    $all['protocol_name_'.$key] = $item->name;
                }

                for ($i=1; $i <= ($protocols->max()->num - count($import->protocols))  ; $i++) { 
                    $all['protocol_name_'.$import->id.$i] = '';
                }

            }else {
                foreach( $import->protocols as $key => $item ) {
                    $all['protocol_name_'.$import->id.$key] = $item->name;
                }
            }

            $permissions       = PermissionsImports::where('import_id', $import->id)->get();
            $permissions_count = PermissionsImports::select(\DB::raw('count(*) as num'))->groupBy('permissions_imports.import_id')->get();

            if( $permissions->count() < $permissions_count->max()->num )
            {

                foreach( $permissions as $key => $item ) {

                    $all['permits_'.$key]           = $item->permit;
                    $all['previous_balances_'.$key] = $item->previous_balance;
                    $all['permit_discharges_'.$key] = $item->permit_discharge;
                    $all['current_balances_'.$key]  = $item->current_balance;
                }

                for ($i=1; $i <= ($permissions_count->max()->num - count($permissions))  ; $i++) { 
                    $all['permit_'.$import->id.$i]           = '';        
                    $all['previous_balance_'.$import->id.$i] = '';
                    $all['permit_discharge_'.$import->id.$i] = '';
                    $all['current_balance_'.$import->id.$i]  = '';
                }
            }else {

                foreach( $permissions as $key => $item ) {
                    $all['permit_'.$import->id.$key]           = $item->permit;
                    $all['previous_balance_'.$import->id.$key] = $item->previous_balance;
                    $all['permit_discharge_'.$import->id.$key] = $item->permit_discharge;
                    $all['current_balance_'.$import->id.$key]  = $item->current_balance;
                }
            }

            $card = CardsImports::where('import_id', $import->id)->first();

            if( $card ) {
                $all['card_1'] = $card->card_one;
                $all['card_2'] = $card->card_two;
                $all['card_3'] = $card->card_three;
            }else{
                $all['card_1'] = '';
                $all['card_2'] = '';
                $all['card_3'] = '';
            }

            if( $import->patent ) {
                $all['patent'] = $import->patent->patent;
                $all['agent_aduanal'] = $import->patent->agent_aduanal;  
            }  else{

                $all['patent'] = '';
                $all['agent_aduanal'] = '';  
            }
            
            $pediments       = PedimentsImports::where('import_id', $import->id)->get();
            $pediment        = Pediment::all();
            $pediments_count = PedimentsImports::select(\DB::raw('count(*) as num'))->groupBy('pediments_imports.import_id')->get();
            
            foreach( $pediment as $pedi ) {

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

            $all['date_transfer']              = $import->date_transfer;
            $all['date_previous']              = $import->date_previous;
            $all['date_dispatch']              = $import->date_dispatch;
            $all['date_delivery']              = $import->date_delivery;
            $all['who_receives']               = $import->who_receives;
            if( $import->recognition ) {
                $all['recognition_id']         = $import->recognition->name;
            }else {
                $all['recognition_id']         = '';
            }            
            $all['recognition_departure_time'] = $import->recognition_departure_time;

            $results->push($all);

        }

        return $results;
 
    }

    public function headings(): array
    {

        $imports = Import::all();

        $info = [
            'Referencia',
            'Courier',
            'Fecha de notificacion',
            'Mawb',
            'Hawb',
            'Linea Aerea',
            'CR',
            'Incoterm',
            'Importador',
            'Proveedor',
            'Consignatorio',
            'Pais destino',
            'Aeropuerto',
            'Nro facturas',
            'Fecha facturas'
        ];

        $products    = ProductsImports::select(\DB::raw('count(*) as num'))->groupBy('products_imports.import_id')->get();
        $permissions = PermissionsImports::select(\DB::raw('count(*) as num'))->groupBy('permissions_imports.import_id')->get();
        $pediments   = PedimentsImports::select(\DB::raw('count(*) as num'))->groupBy('pediments_imports.import_id')->get();
        $pediment    = Pediment::all();
        $protocols   = ProtocolsImports::select(\DB::raw('count(*) as num'))->groupBy('protocols_imports.import_id')->get();
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

        array_push($info, 'Fecha de transferencia');
        array_push($info, 'Fecha de previo');
        array_push($info, 'Fecha de despacho');
        array_push($info, 'Fecha de entrega');
        array_push($info, 'Quien recibe');
        array_push($info, 'Reconocimiento aduanero');
        array_push($info, 'Hora de salida de reconocimiento');

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
