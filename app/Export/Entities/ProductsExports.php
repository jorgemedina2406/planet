<?php

namespace App\Export\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsExports extends Model
{
    use SoftDeletes;

    protected $table = 'products_exports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'export_id',
        'product_id',
        'qty',
        'unid',
        'price',
        'fraccion'
    ];

    public $timestamps = true;

}
