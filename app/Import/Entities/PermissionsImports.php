<?php

namespace App\Import\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionsImports extends Model
{
    use SoftDeletes;

    protected $table = 'permissions_imports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'import_id',
        'permit',
        'previous_balance',
        'permit_discharge',
        'current_balance'
    ];

    public $timestamps = true;

}
