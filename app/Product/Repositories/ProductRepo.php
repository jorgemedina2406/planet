<?php
namespace App\Product\Repositories;

use App\Product\Entities\Product;

/**
 * Class ProductRepo
 *
 * @package App\Product\Repositories
 * @author  Jorge Medina
 */
class ProductRepo
{
    public function createProduct($data)
    {
        $product = Product::create($data);

        return $product;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Product::all()->sortByDesc('name');
        }else{
            return Product::all()->sortBy('name');
        }
    }

}
