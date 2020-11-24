<?php

namespace App\Protocol\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;
use App\Import\Entities\Import;

class Protocol extends Model
{
    use SoftDeletes;

    protected $table = 'protocols';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'    
    ];

    public $timestamps = true;

    /**
     * Relationship with the User entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exports()
    {
        return $this->belongsToMany(Export::class, 'protocols_exports');
    }

    /**
     * Relationship with the Import entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function imports()
    {
        return $this->belongsToMany(Import::class, 'protocols_imports');
    }

}
