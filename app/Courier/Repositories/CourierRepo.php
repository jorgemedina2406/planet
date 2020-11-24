<?php
namespace App\Courier\Repositories;

use App\Courier\Entities\Courier;

/**
 * Class CourierRepo
 *
 * @package App\Courier\Repositories
 * @author  Jorge Medina
 */
class CourierRepo
{
    public function createCourier($data)
    {
        $courier = Courier::create($data);

        return $courier;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Courier::all()->sortByDesc('name');
        }else{
            return Courier::all()->sortBy('name');
        }
    }

}
