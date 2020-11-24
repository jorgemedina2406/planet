<?php
namespace App\Airport\Repositories;

use App\Airport\Entities\Airport;

/**
 * Class AirportRepo
 *
 * @package App\Airport\Repositories
 * @author  Jorge Medina
 */
class AirportRepo
{
    public function createAirport($data)
    {
        $airport = Airport::create($data);

        return $airport;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Airport::all()->sortByDesc('name');
        }else{
            return Airport::all()->sortBy('name');
        }
    }

}
