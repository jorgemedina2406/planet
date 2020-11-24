<?php
namespace App\Consignee\Repositories;

use App\Consignee\Entities\Consignee;

/**
 * Class ConsigneeRepo
 *
 * @package App\Consignee\Repositories
 * @author  Jorge Medina
 */
class ConsigneeRepo
{
    public function createConsignee($data)
    {
        return Consignee::create($data);
    }

        
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Consignee::all()->sortByDesc('name');
        }else{
            return Consignee::all()->sortBy('name');
        }
    }

}
