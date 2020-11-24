<?php

namespace App\Import\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProtocolsImports extends Model
{
    use SoftDeletes;

    protected $table = 'protocols_imports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'import_id',
        'protocol_id'

    ];

    public $timestamps = true;

}
