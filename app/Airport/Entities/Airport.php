<?php

namespace App\Airport\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;
use App\Consignee\Entities\Consignee;
use App\Exporter\Entities\Exporter;
use App\Country\Entities\Country;

class Airport extends Model
{
    use SoftDeletes;

    protected $table = 'airports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'country',
        'city'  
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function export()
    {
        return $this->hasMany(Export::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function import()
    {
        return $this->hasMany(Import::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function exporter()
    {
        return $this->hasMany(Exporter::class);
    }

}
