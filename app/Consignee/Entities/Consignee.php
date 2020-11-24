<?php

namespace App\Consignee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;
use App\Country\Entities\Country;

class Consignee extends Model
{
    use SoftDeletes;

    protected $table = 'consignatories';
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
