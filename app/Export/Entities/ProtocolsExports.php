<?php

namespace App\Export\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProtocolsExports extends Model
{
    use SoftDeletes;

    protected $table = 'protocols_exports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'export_id',
        'protocol'
    ];

    public $timestamps = true;

}
