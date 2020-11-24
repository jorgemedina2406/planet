<?php
namespace App\Import\Repositories;

use App\Import\Entities\Import;

/**
 * Class ImportRepo
 *
 * @package App\Import\Repositories
 * @author  Jorge Medina
 */
class ImportRepo
{
    public function createImport($data)
    {
        $import = Import::create($data);

        return $import;
    }
    
    public function getAll($sort)
    {
        $exp = Import::select('imports.*', 
                                \DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(reference, '/', 2), '/', -1) AS UNSIGNED) AS ref"))
                                ->orderBy('ref', $sort)
                                ->get();

        return $exp;

        // return Import::all()->sortBy('reference');
    }
    
    public function getImportsNew()
    {
        return Import::where('status_id', 1)->count();
    }

    public function getImportsCancel()
    {
        return Import::where('status_id', 4)->count();
    }

    public function getImportsProcess()
    {
        return Import::where('status_id', 2)->count();
    }

    public function getImportsFinish()
    {
        return Import::where('status_id', 3)->count();
    }

    public function getImportsRevalid()
    {
        return Import::where('status_id', 5)->count();
    }

    public function getImportsDespacho()
    {
        return Import::where('status_id', 6)->count();
    }

    public function getImportsRed()
    {
        return Import::where('status_id', 7)->count();
    }

    public function getImportsGreen()
    {
        return Import::where('status_id', 8)->count();
    }

    public function getImportsDelivered()
    {
        return Import::where('status_id', 9)->count();
    }

    public function getImportsEnero()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 01)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsFebrero()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 02)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsMarzo()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 03)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsAbril()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 04)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsMayo()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 05)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsJunio()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 06)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsJulio()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 07)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsAgosto()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 8)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsSeptiembre()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 9)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsOctubre()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 10)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsNoviembre()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 11)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }
    public function getImportsDiciembre()
    {
        return Import::where(\DB::raw('MONTH(created_at)'), '=', 12)->where(\DB::raw('YEAR(created_at)'), '=', 2020)->count();
    }

}
