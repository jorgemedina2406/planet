<?php

namespace App\Profile\Entities;

use App\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'profiles';
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
        'lastname',
        'phone',
        'mobile_phone',
        'street',
        'nro_ext',
        'nro_int',
        'colony',
        'municipality',
        'federal_entity',
        'postal',
        'country',
        'city',
        'state'
    ];

    public $timestamps = true;

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }

    public function getNameAttribute($valor)
    {
        return ucwords($valor);
    }

    public function setLastNameAttribute($valor)
    {
        $this->attributes['lastname'] = strtolower($valor);
    }

    public function getLastNameAttribute($valor)
    {
        return ucwords($valor);
    }
    

    /** RELATIONS **/

    /**
     * Relationship with the User entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
