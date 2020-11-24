<?php
namespace App\Provider\Repositories;

use App\Provider\Entities\Provider;

/**
 * Class ProviderRepo
 *
 * @package App\Provider\Repositories
 * @author  Jorge Medina
 */
class ProviderRepo
{
    public function createProvider($data)
    {
        return Provider::create($data);
    }

        
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Provider::all()->sortByDesc('name');
        }else{
            return Provider::all()->sortBy('name');
        }
    }

}
