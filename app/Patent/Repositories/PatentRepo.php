<?php
namespace App\Patent\Repositories;

use App\Patent\Entities\Patent;

/**
 * Class PatentRepo
 *
 * @package App\Patent\Repositories
 * @author  Jorge Medina
 */
class PatentRepo
{
    public function createPatent($data)
    {
        $patent = Patent::create($data);

        return $patent;
    }
    
    public function getAll($sort)
    {
        
        if( $sort === 'desc' ) {
            return Patent::all()->sortByDesc('patent');
        }else{
            return Patent::all()->sortBy('patent');
        }
    }

}
