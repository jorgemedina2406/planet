<?php

namespace App\Incoterm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;
use App\Import\Entities\Import;

class Incoterm extends Model
{
    use SoftDeletes;

    protected $table = 'incoterms';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'    
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function export()
    {
        return $this->hasMany(Export::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function import()
    {
        return $this->hasMany(Import::class);
    }

}
