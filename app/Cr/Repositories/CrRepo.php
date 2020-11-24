<?php
namespace App\Cr\Repositories;

use App\Cr\Entities\Cr;

/**
 * Class CrRepo
 *
 * @package App\Cr\Repositories
 * @author  Jorge Medina
 */
class CrRepo
{
    public function createCr($data)
    {
        $cr = Cr::create($data);

        return $cr;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Cr::all()->sortByDesc('name');
        }else{
            return Cr::all()->sortBy('name');
        }
    }

}
