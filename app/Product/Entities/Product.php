<?php

namespace App\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;
use App\Import\Entities\Import;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'provider',
        'unid',
        'qty',
        'price',
        'fraccion',
        'status'
    ];

    public $timestamps = true;

    /**
     * Relationship with the User entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exports()
    {
        return $this->belongsToMany(Export::class, 'products_exports')->withPivot('qty', 'unid', 'price', 'fraccion');
    }

    /**
     * Relationship with the Import entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function imports()
    {
        return $this->belongsToMany(Import::class, 'products_imports')->withPivot('qty', 'unid', 'price', 'fraccion');
    }

}
