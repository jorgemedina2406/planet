<?php

namespace App\Export\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionsExports extends Model
{
    use SoftDeletes;

    protected $table = 'permissions_exports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'export_id',
        'permit',
        'previous_balance',
        'permit_discharge',
        'current_balance'
    ];

    public $timestamps = true;

}
