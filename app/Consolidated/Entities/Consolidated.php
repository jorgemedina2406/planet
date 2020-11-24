<?php

namespace App\Consolidated\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/* ENTITIES */
use App\Courier\Entities\Courier;

class Consolidated extends Model
{
    use SoftDeletes;

    protected $table = 'consolidated';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'des',
        'guie',
        'hawbs',
        'hawbs_delivered',
        'hawns_planet',
        'date_notification',
        'courier_id'
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

}
