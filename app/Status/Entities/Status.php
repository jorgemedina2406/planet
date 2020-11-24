<?php

namespace App\Status\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Export\Entities\Export;
use App\Import\Entities\Import;

class Status extends Model
{
    use SoftDeletes;

    // public $transformer = UserTransformer::class;

    protected $table = 'status';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

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
