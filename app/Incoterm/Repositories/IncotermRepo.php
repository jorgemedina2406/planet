<?php
namespace App\Incoterm\Repositories;

use App\Incoterm\Entities\Incoterm;

/**
 * Class IncotermRepo
 *
 * @package App\Incoterm\Repositories
 * @author  Jorge Medina
 */
class IncotermRepo
{
    public function createIncoterm($data)
    {
        $incoterm = Incoterm::create($data);

        return $incoterm;
    }
    
    public function getAll($sort)
    {
        if( $sort === 'desc' ) {
            return Incoterm::all()->sortByDesc('name');
        }else{
            return Incoterm::all()->sortBy('name');
        }
    }

}
