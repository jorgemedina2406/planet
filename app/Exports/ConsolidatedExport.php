<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use App\Consolidated\Entities\Consolidated;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

use App\Http\Resources\ExportExcel as ExportExcelResource;

class ConsolidatedExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    use RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $consolidateds = Consolidated::all();

        $results = collect();

        $all = [];

        foreach( $consolidateds as $consolidated) {

            $all = [
                'des'               => 'DES'.date('y').$consolidated->des,
                'courier'           => $consolidated->courier->name,
                'guie'              => $consolidated->guie,
                'hawbs'             => $consolidated->hawbs,
                'hawbs_delivered'   => $consolidated->hawbs_delivered,
                'hawns_planet'      => $consolidated->hawns_planet,
                'date_notification' => $consolidated->date_notification,
            ];

            $results->push($all);

        }

        return $results;

    }

    public function headings(): array
    {

        $info = [
            'Des19',        
            'Courier',        
            'Guia Master',        
            'Hawbs',          
            'Hawbs entregados',      
            'Hawbns Planet',        
            'Fecha de notificacion'
        ];

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
