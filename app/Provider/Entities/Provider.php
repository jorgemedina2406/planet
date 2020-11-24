<?php

namespace App\Provider\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Import\Entities\Import;
use App\Country\Entities\Country;

class Provider extends Model
{
    use SoftDeletes;

    protected $table = 'providers';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'street',
        'nro_ext',
        'nro_int',
        'colony',
        'municipality',
        'federal_entity',
        'postal',
        'country_id',
    ];

    public $timestamps = true;    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function import()
    {
        return $this->hasMany(Import::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
