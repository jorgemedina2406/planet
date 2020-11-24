<?php

namespace App\Export\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardsExports extends Model
{
    use SoftDeletes;

    protected $table = 'cards_exports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'card_id',
        'export_id'
    ];

    public $timestamps = true;

}
