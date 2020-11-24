<?php
namespace App\Export\Repositories;

use App\Export\Entities\Export;

/**
 * Class ExportRepo
 *
 * @package App\Export\Repositories
 * @author  Jorge Medina
 */
class ExportRepo
{
    public function createExport($data)
    {
        $export = Export::create($data);

        return $export;
    }
    
    public function getAll($sort)
    {

        // if( $sort === 'desc' ) {
        //     return Export::all()->sortByDesc('reference');
        // }else{
            // return Export::all()->sortBy('reference');

            // $exp = Export::paginate(10);
            $exp = Export::select('exports.*', 
                                \DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(reference, '/', 2), '/', -1) AS UNSIGNED) AS ref"))
                                ->orderBy('ref', $sort)
                                ->get();

            // \Log::debug('EXP',[$exp]);

            return $exp;

        // }

    }

    public function getExportsNew()
    {
        return Export::where('status_id', 1)->count();
    }

    public function getExportsCancel()
    {
        return Export::where('status_id', 4)->count();
    }

    public function getExportsProcess()
    {
        return Export::where('status_id', 2)->count();
    }

    public function getExportsFinish()
    {
        return Export::where('status_id', 3)->count();
    }
    
    public function getExportsRevalid()
    {
        return Export::where('status_id', 5)->count();
    }

    public function getExportsDespacho()
    {
        return Export::where('status_id', 6)->count();
    }

    public function getExportsRed()
    {
        return Export::where('status_id', 7)->count();
    }

    public function getExportsGreen()
    {
        return Export::where('status_id', 8)->count();
    }

    public function getExportsDelivered()
    {
        return Export::where('status_id', 9)->count();
    }

    public function getExportsEnero()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 01)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsFebrero()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 02)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsMarzo()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 03)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsAbril()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 04)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsMayo()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 05)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsJunio()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 06)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsJulio()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 07)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsAgosto()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 8)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsSeptiembre()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 9)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsOctubre()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 10)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsNoviembre()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 11)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getExportsDiciembre()
    {
        return Export::where(\DB::raw('MONTH(created_at)'), '=', 12)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }

}
