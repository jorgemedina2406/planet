<?php

namespace App\Tax\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;

class Tax extends Model
{
    use SoftDeletes;

    protected $table = 'customs_tax';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ige',
        'dta',
        'prv',
        'cnt'
    ];

    public $timestamps = true;

}
