<?php

namespace App\Configs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User\Entities\User;

class Config extends Model
{
    use SoftDeletes;

    protected $table = 'configs';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country',
        'state',
        'city',
        'colony',
        'street',
        'nro_int',
        'nro_ext'
    ];

    public $timestamps = true;

}
