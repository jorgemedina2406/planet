<?php

namespace App\Import\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardsImports extends Model
{
    use SoftDeletes;

    protected $table = 'cards_imports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'import_id',
        'protocol_one',
        'protocol_two',
        'protocol_three'
    ];

    public $timestamps = true;

}
