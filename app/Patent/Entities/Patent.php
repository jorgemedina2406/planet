<?php

namespace App\Patent\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;

class Patent extends Model
{
    use SoftDeletes;

    protected $table = 'patents';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patent',
        'agent_aduanal',
        'status'
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
    public function import()
    {
        return $this->hasMany(Import::class);
    }

}
