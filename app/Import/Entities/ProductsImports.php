<?php

namespace App\Import\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsImports extends Model
{
    use SoftDeletes;

    protected $table = 'products_imports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'import_id',
        'product_id',
        'qty',
        'unid',
        'price',
        'fraccion'
    ];

    public $timestamps = true;

}
