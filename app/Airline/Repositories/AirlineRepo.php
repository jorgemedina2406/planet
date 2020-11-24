<?php
namespace App\Airline\Repositories;

use App\Airline\Entities\Airline;

/**
 * Class AirlineRepo
 *
 * @package App\Airline\Repositories
 * @author  Jorge Medina
 */
class AirlineRepo
{
    public function createAirline($data)
    {
        $airline = Airline::create($data);

        return $airline;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Airline::all()->sortByDesc('name');
        }else{
            return Airline::all()->sortBy('name');
        }
    }

}
