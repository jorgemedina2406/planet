<?php
namespace App\Tax\Repositories;

use App\Tax\Entities\Tax;

/**
 * Class TaxRepo
 *
 * @package App\Tax\Repositories
 * @author  Jorge Medina
 */
class TaxRepo
{
    public function createTax($data)
    {
        $tax = Tax::create($data);

        return $tax;
    }
    
    public function getAll()
    {
        return Tax::all()->sortByDesc('created_at');
    }

}
