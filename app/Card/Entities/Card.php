<?php

namespace App\Card\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Export\Entities\Export;
use App\Import\Entities\Import;

class Card extends Model
{
    use SoftDeletes;

    protected $table = 'cards';
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
        return $this->belongsToMany(Export::class, 'cards_exports');
    }

    /**
     * Relationship with the Import entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function imports()
    {
        return $this->belongsToMany(Import::class, 'cards_imports');
    }

}
