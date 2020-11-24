<?php
namespace App\Pediment\Repositories;

use App\Pediment\Entities\Pediment;

/**
 * Class PedimentRepo
 *
 * @package App\Pediment\Repositories
 * @author  Jorge Medina
 */
class PedimentRepo
{
    public function createPediment($data)
    {
        $pediment = Pediment::create($data);

        return $pediment;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Pediment::all()->sortByDesc('pediment');
        }else{
            return Pediment::all()->sortBy('pediment');
        }
    }

}
