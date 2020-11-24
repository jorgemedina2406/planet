<?php

namespace App\Http\Controllers\Admin\Catalogs\Currency;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Currency\Entities\Currency;

/* REPOSITORIES */
use App\Currency\Repositories\CurrencyRepo;

/* RESOURCE */
use App\Http\Resources\Currency as CurrencyResource;

/* LIB */
use PDF;
use Image;

class CurrencyController extends ApiController
{
    private $currencyRepo;

    public function __construct( CurrencyRepo $currencyRepo )
    {
        $this->currencyRepo = $currencyRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.currencies.index');
    }

    /**
     * Get data Currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataCurrency(Request $request)
    {

        $sort = $request->sort['sort'];
        $currencies = $this->currencyRepo->getAll($sort);
        
        return CurrencyResource::collection($currencies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $currency = $this->currencyRepo->createCurrency($data);

        return redirect()->back()->with('message_success', 'Moneda agregada');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        $data['currency'] = $currency;
        
        return view('admin.catalogs.currencies.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Currency $currency)
    {
        $data['currency'] = $currency;
        
        return view('admin.catalogs.currencies.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {

        $currency->update([
            'name'   => $request->name,
            'code'   => $request->code,
            'symbol' => $request->symbol,
            'rate'   => $request->rate
        ]);

        $currency->save();

        return redirect()->route('currencies')->with('message_success', 'Moneda actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Currency $currency)
    {
        $currency->delete();
    }
}
