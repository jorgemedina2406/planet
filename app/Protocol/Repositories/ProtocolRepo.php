<?php
namespace App\Protocol\Repositories;

use App\Protocol\Entities\Protocol;

/**
 * Class ProtocolRepo
 *
 * @package App\Protocol\Repositories
 * @author  Jorge Medina
 */
class ProtocolRepo
{
    public function createProtocol($data)
    {
        $protocol = Protocol::create($data);

        return $protocol;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Protocol::all()->sortByDesc('name');
        }else{
            return Protocol::all()->sortBy('name');
        }
    }

}
