<?php
namespace App\Country\Repositories;

use App\Country\Entities\Country;

/**
 * Class CountryRepo
 *
 * @package App\Country\Repositories
 * @author  Jorge Medina
 */
class CountryRepo
{
    public function createCountry($data)
    {
        $country = Country::create($data);

        return $country;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Country::all()->sortByDesc('name');
        }else{
            return Country::all()->sortBy('name');
        }
    }

}
