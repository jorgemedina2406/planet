<?php

namespace App\Http\Controllers\Admin\Report;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Patent\Entities\Patent;
use App\Exporter\Entities\Exporter;
use App\Importer\Entities\Importer;
use App\Courier\Entities\Courier;
use App\Export\Entities\Export;
use App\Import\Entities\Import;
use App\Tax\Entities\Tax;

/* REPOSITORIES */
use App\Patent\Repositories\PatentRepo;

/* RESOURCE */
use App\Http\Resources\Patent as PatentResource;

/* LIB */
use PDF;
use Image;
use Carbon\Carbon;

use App\Exports\ReportImports;
use App\Exports\ReportExports;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends ApiController
{
    private $patentRepo;

    public function __construct( PatentRepo $patentRepo )
    {
        $this->patentRepo = $patentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['Importer']
        // $data['exporters'] = Exporter::all();
        // $data['importers'] = Importer::all();
        // $data['couriers']  = Courier::all();

        $dataReport  = [];
        $dataType    = [];
        $dataStatus  = [];
        $dataCourier = [];
        $exporters   = Exporter::all();
        $importers   = Importer::all();
        $couriers    = Courier::all();   
        // $status      = $request->status;
        // $courier     = $request->courier;
        // $importer    = $request->importer;
        // $exporter    = $request->exporter;
        // $date_start  = $request->date;
        // $date_end    = $request->date_end;

        // $dateStart   = Carbon::parse($date_start);   
        // $dateEnd     = Carbon::parse($date_end);   
        
        $currentYear  = Carbon::now()->format('Y');
        $currentMonth = Carbon::now()->format('m');
        $endDayOfMonth = (int)Carbon::now()->endOfMonth()->format('d');
        $dayOfMonthProgram = Carbon::now()->startOfMonth();
        $dateNow = Carbon::now();

        // $diffNow = $dateNow->diffInDays($date_start);

        // \Log::debug('date_start',[$date_start]);

        // \Log::debug('DAteStart',[$dateStart]);

        // if( $request->type == 1 ) {

            $query      = Import::all();
            $tax        = Tax::find(1);
            $type       = 1;

            $queryChart = collect();

            // \Log::debug('$dateNow->diffInDays($date_start)',[$dateNow->diffInDays($date_start)]);

            // if( $date_start != '' && !$date_end ){

                // if( $dateNow->diffInDays($date_start) > 31 ) {
                //     \Log::debug('assssss',['vvvvvvvvvv']);

                // }else{

                    for($i = 0; $i < $endDayOfMonth; $i++) {

                        $data['date'] = $dayOfMonthProgram->format('Y-m-d');
                        $queryChartsEx = Export::charts($data)->get();
                        $queryCharts = Import::charts($data)->get();
                        // $data['date_start'] = $i;

                        $queryChart->push(array(
                            'y' => $dayOfMonthProgram->format('m-d'),
                            'a' => $queryCharts->count(),
                            'b' => $queryChartsEx->count()
                        ));

                        $dayOfMonthProgram->addDay(1);
                    }
                    // $queryChart = 

                

            // $data['date'] = $date_start;
            $type = 2;
            $data['date'] = $dayOfMonthProgram->subMonth(1)->format('Y-m-d');
            $data['sort'] = 'asc';
            $query = Export::filters($data)->get();
        

        return view('admin.reports.reports', compact('type','query','queryChart','exporters','importers','couriers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['sort'] = 'asc';
        \Log::debug('DATA',[$data]);
        
        if( $request->type == 1 && $request->export == 1 ) {

            $query = Import::all();
            
            return (new ReportImports($data))->download('imports.xlsx');

        }elseif( $request->type == 2 && $request->export == 1 ){
            
            return (new ReportExports($data))->download('exports.xlsx');
        }


        $dataReport  = [];
        $dataType    = [];
        $dataStatus  = [];
        $dataCourier = [];
        $exporters   = Exporter::all();
        $importers   = Importer::all();
        $couriers    = Courier::all();   
        $status      = $request->status;
        $courier     = $request->courier;
        $importer    = $request->importer;
        $exporter    = $request->exporter;
        $mawb        = $request->mawb;
        $date_start  = $request->date;
        $date_end    = $request->date_end;
        $sort        = 'asc';

        $dateStart   = Carbon::parse($date_start);   
        $dateEnd     = Carbon::parse($date_end);   
        
        $currentYear  = Carbon::now()->format('Y');
        $currentMonth = Carbon::now()->format('m');
        $endDayOfMonth = (int)Carbon::now()->endOfMonth()->format('d');
        $dayOfMonthProgram = Carbon::now()->startOfMonth();
        $dateNow = Carbon::now();

        $diffNow = $dateNow->diffInDays($date_start);

        if( $request->type == 1 ) {

            $query      = Import::all();
            $tax        = Tax::find(1);
            $type       = 1;

            $queryChart = collect();

            if( $date_start != '' && !$date_end ){

                if( $dateNow->diffInDays($date_start) > 31 ) {

                }else{

                    for($i = 0; $i < $diffNow; $i++) {

                        $data['date'] = $dateStart->format('Y-m-d');
                        $queryCharts = Import::charts($data)->get();
                        $queryChartsEx = Export::charts($data)->get();
                        // $data['date_start'] = $i;

                        $queryChart->push(array(
                            'y' => $dateStart->format('m-d'),
                            'a' => $queryCharts->count(),
                            'b' => $queryChartsEx->count()
                        ));

                        $dateStart->addDay(1);
                    }
                    // $queryChart = 
                }

            }elseif( !$date_start && !$date_end ) {

                for($i = 0; $i < $endDayOfMonth; $i++) {

                    $data['date'] = $dayOfMonthProgram->format('Y-m-d');
                    $queryChartsEx = Export::charts($data)->get();
                    $queryCharts = Import::charts($data)->get();
                    // $data['date_start'] = $i;

                    $queryChart->push(array(
                        'y' => $dayOfMonthProgram->format('m-d'),
                        'a' => $queryCharts->count(),
                        'b' => $queryChartsEx->count()
                    ));

                    $dayOfMonthProgram->addDay(1);
                }

            }elseif( $date_start && $date_end ) {

                $diffEnd = $dateEnd->diffInDays($date_start);
                
                if( Carbon::parse($date_end)->diffInDays($date_start) > 31 ) {

                }else{

                    for($i = 0; $i < $diffEnd; $i++) {

                        $data['date'] = $dateStart->format('Y-m-d');
                        $queryCharts = Import::charts($data)->get();
                        $queryChartsEx = Export::charts($data)->get();
                        // $data['date_start'] = $i;

                        $queryChart->push(array(
                            'y' => $dateStart->format('m-d'),
                            'a' => $queryCharts->count(),
                            'b' => $queryChartsEx->count()
                        ));

                        $dateStart->addDay(1);
                    }

                }

            }

            $data['date'] = $date_start;
            $data['sort'] = $sort;
            $query = Import::filters($data)->get();
            
        }elseif( $request->type == 2 ){


            \Log::debug('DATA 6',['asdasdsad']);

            $query = Export::all();
            $tax   = Tax::find(1);
            $type = 2;

            $queryChart = collect();

            if( $date_start != '' && !$date_end ){

                if( $dateNow->diffInDays($date_start) > 31 ) {

                }else{

                    for($i = 0; $i < $diffNow; $i++) {

                        $data['date'] = $dateStart->format('Y-m-d');
                        \Log::debug('DATA 1',[$data]);
                        $queryCharts = Import::charts($data)->get();
                        $queryChartsEx = Export::charts($data)->get();
                        // $data['date_start'] = $i;

                        $queryChart->push(array(
                            'y' => $dateStart->format('m-d'),
                            'a' => $queryCharts->count(),
                            'b' => $queryChartsEx->count()
                        ));

                        $dateStart->addDay(1);
                    }
                    // $queryChart = 

                }

            }elseif( !$date_start && !$date_end ) {

                for($i = 0; $i < $endDayOfMonth; $i++) {

                    $data['date'] = $dayOfMonthProgram->format('Y-m-d');
                    \Log::debug('DATA 2',[$data]);
                    $queryChartsEx = Export::charts($data)->get();
                    $queryCharts = Import::charts($data)->get();
                    // $data['date_start'] = $i;

                    $queryChart->push(array(
                        'y' => $dayOfMonthProgram->format('m-d'),
                        'a' => $queryCharts->count(),
                        'b' => $queryChartsEx->count()
                    ));

                    $dayOfMonthProgram->addDay(1);
                }

            }elseif( $date_start && $date_end ) {

                $diffEnd = $dateEnd->diffInDays($date_start);

                if( Carbon::parse($date_end)->diffInDays($date_start) > 31 ) {

                }else{

                    for($i = 0; $i < $diffEnd; $i++) {

                        $data['date'] = $dateStart->format('Y-m-d');
                        \Log::debug('DATA 3',[$data]);
                        $queryCharts = Import::charts($data)->get();
                        $queryChartsEx = Export::charts($data)->get();
                        // $data['date_start'] = $i;

                        $queryChart->push(array(
                            'y' => $dateStart->format('m-d'),
                            'a' => $queryCharts->count(),
                            'b' => $queryChartsEx->count()
                        ));

                        $dateStart->addDay(1);
                    }
                }

            }

            $data['date'] = $date_start;
            $data['sort'] = $sort;
            $query = Export::filters($data)->get();
        }


        return view('admin.reports.reports', compact('queryChart', 'status', 'importer', 'date_start', 'date_end', 'exporter', 'type', 'courier', 'couriers', 'importers', 'exporters', 'query') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function exportExcel(Request $request)
    {

        \Log::debug('DATA 4',[$data]);


        $data = $request->all();
        $sort = 'asc';
        $data['sort'] = $sort;  

        \Log::debug('DATA 5',[$data]);


        if( $request->type == 1 ) {

            $query = Import::all();
            
            return (new ReportImports($data))->download('imports.xlsx');

        }elseif( $request->type == 2 ){
            
            return (new ReportExports($data))->download('exports.xlsx');
        }

        
    }

}
