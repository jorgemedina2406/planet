<?php

namespace App\Exporter\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;
use App\Country\Entities\Country;

class Exporter extends Model
{
    use SoftDeletes;

    protected $table = 'exporters';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'rfc',
        'email',
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
    public function export()
    {
        return $this->hasMany(Export::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
