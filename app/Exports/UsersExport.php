<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use App\User\Entities\User;
use App\Export\Entities\ProductsExports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

use App\Http\Resources\ExportExcel as ExportExcelResource;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    use RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::all();

        $results = collect();

        $all = [];

        foreach( $users as $user) {

            if( $user->activated == 1){

                $status = 'Activado';

            }else {

                $status = 'Desactivado';
            }

            $all = [
                'email'          => $user->email,
                'status'         => $status,
                'name'           => $user->profile->name,
                'lastname'       => $user->profile->lastname,
                'street'         => $user->profile->street,
                'nro_ext'        => $user->profile->nro_ext,
                'nro_int'        => $user->profile->nro_int, 
                'colony'         => $user->profile->colony,  
                'municipality'   => $user->profile->municipality,
                'federal_entity' => $user->profile->federal_entity,
                'postal'         => $user->profile->postal,     
                'role'           => $user->role
            ];

            $results->push($all);

        }

        return $results;

    }

    public function headings(): array
    {

        $info = [
            'Email' ,        
            'Estatus',        
            'Nombre',          
            'Apellido',      
            'Calle',        
            'Nro. Exterior',       
            'Nro. Interior',       
            'Colonia',        
            'Municipio',  
            'Entidad federal',
            'Cod. Postal',
            'Role'
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
