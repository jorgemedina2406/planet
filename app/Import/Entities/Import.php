<?php

namespace App\Import\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product\Entities\Product;
use App\Country\Entities\Country;
use App\Consignee\Entities\Consignee;
use App\Exporter\Entities\Exporter;
use App\Status\Entities\Status;
use App\Patent\Entities\Patent;
use App\Incoterm\Entities\Incoterm;
use App\Protocol\Entities\Protocol;
use App\Card\Entities\Card;
use App\Cr\Entities\Cr;
use App\Courier\Entities\Courier;
use App\Airline\Entities\Airline;
use App\Importer\Entities\Importer;
use App\Provider\Entities\Provider;
use App\User\Entities\User;
use App\Recognition\Entities\Recognition;
use Carbon\Carbon;

class Import extends Model
{
    use SoftDeletes;

    protected $table = 'imports';
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'reference',
        'courier_id',
        'date_notification',
        'mawb',
        'hawb',
        'line_id',
        'cr_id',
        'incoterm_id',
        'importer_id',
        'provider_id',
        'consignee_id',
        'destination_country',
        'airport',
        'nro_invoices',
        'date_invoices',
        'status_id',
        'patent_id',
        'date_transfer',
        'date_previous',
        'date_dispatch',
        'date_delivery',
        'who_receives',
        'recognition_id',
        'recognition_departure_time',
        'evidence',
        'user_id',
        'user_update',
        'observation'
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_imports')->withPivot('qty', 'unid', 'price', 'fraccion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function protocols()
    {
        return $this->belongsToMany(Protocol::class, 'protocols_imports');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'cards_imports');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'destination_country');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'user_update');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recognition()
    {
        return $this->belongsTo(Recognition::class, 'recognition_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consignee()
    {
        return $this->belongsTo(Consignee::class, 'consignee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shippers()
    {
        return $this->belongsTo(Exporter::class, 'exporter_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function importer()
    {
        return $this->belongsTo(Importer::class, 'importer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cr()
    {
        return $this->belongsTo(Cr::class, 'cr_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function airline()
    {
        return $this->belongsTo(Airline::class, 'line_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function incoterm()
    {
        return $this->belongsTo(Incoterm::class, 'incoterm_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exporter()
    {
        return $this->belongsTo(Exporter::class, 'exporter_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function patent()
    {
        return $this->belongsTo(Patent::class, 'patent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function scopeFilters($query, $data) 
    {

        $query->select('imports.*',
             \DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(reference, '/', 2), '/', -1) AS INTEGER) AS ref"));

        if( $data['date'] && !$data['date_end'] )
        {
            $date_created = $data['date'];
            $date = Carbon::parse($date_created)->format('Y-m-d');

            $query->whereDate('created_at', '>=', $date);
            
        }

        if( $data['date'] && $data['date_end'] )
        {
            $date_created = $data['date'];
            $date_end = $data['date_end'];
            $date = Carbon::parse($date_created)->format('Y-m-d');
            $date_end = Carbon::parse($date_end)->format('Y-m-d');

            $query->whereBetween('created_at', [$date, $date_end]);
            
        }
        
        if( $data['importer'] )
        {
            $query->where('importer_id', $data['importer']);
        }

        if( $data['courier'] )
        {
            $query->where('courier_id', $data['courier']);
        }

        if( $data['status'] )
        {
            $query->where('status_id', $data['status']);
        }

        if( isset($data['mawb']) )
        {
            $query->where('mawb', $data['mawb']);
        }

        $query->orderBy('ref', $data['sort']);
        
        return $query;
        
     }

    public function scopeCharts($query, $data) 
    {

        // if( $data['date'] && !$data['date_end'] )
        // {
            $date = $data['date'];

            $query->whereDate('created_at', '=', $date);
            
        // }

        // if( $data['date'] && $data['date_end'] )
        // {
        //     $date_created = $data['date'];
        //     $date_end = $data['date_end'];
        //     $date = Carbon::parse($date_created)->format('Y-m-d');
        //     $date_end = Carbon::parse($date_end)->format('Y-m-d');

        //     $query->whereBetween('created_at', [$date, $date_end]);
            
        // }
        
        // if( $data['importer'] )
        // {
        //     $query->where('importer_id', $data['importer']);
        // }

        if( isset($data['courier']) )
        {
            $query->where('courier_id', $data['courier']);
        }

        if( isset($data['status']) )
        {
            $query->where('status_id', $data['status']);
        }
        
        return $query;
        
    }

}
