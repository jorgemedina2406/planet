<?php

namespace App\Import\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Pediment\Entities\Pediment;

class PedimentsImports extends Model
{
    use SoftDeletes;

    protected $table = 'pediments_imports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'import_id',
        'pediment_id',
        'nro_pediment',
        'date_pay'
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pediment()
    {
        return $this->belongsTo(Pediment::class, 'pediment_id');
    }

}
