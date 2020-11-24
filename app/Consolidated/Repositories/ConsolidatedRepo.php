<?php
namespace App\Consolidated\Repositories;

use App\Consolidated\Entities\Consolidated;

/**
 * Class ConsolidatedRepo
 *
 * @package App\Consolidated\Repositories
 * @author  Jorge Medina
 */
class ConsolidatedRepo
{
    public function createConsolidated($data)
    {
        $consolidated = Consolidated::create($data);

        return $consolidated;
    }
    
    public function getAll($sort)
    {

        $cons = Consolidated::select('consolidated.*', 
                                \DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(des, '/', 2), '/', -1) AS INTEGER) AS ref"))
                                ->orderBy('ref', $sort)
                                ->get();
        return  $cons;

        // if( $sort === 'desc' ) {
        //     return Consolidated::all()->sortByDesc('des');
        // }else{
        //     return Consolidated::all()->sortBy('des');
        // }
    }

}
