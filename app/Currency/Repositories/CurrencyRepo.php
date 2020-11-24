<?php
namespace App\Currency\Repositories;

use App\Currency\Entities\Currency;

/**
 * Class CurrencyRepo
 *
 * @package App\Currency\Repositories
 * @author  Jorge Medina
 */
class CurrencyRepo
{
    public function createCurrency($data)
    {
        $currency = Currency::create($data);

        return $currency;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Currency::all()->sortByDesc('name');
        }else{
            return Currency::all()->sortBy('name');
        }
    }

}
