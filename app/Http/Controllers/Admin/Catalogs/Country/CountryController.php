<?php

namespace App\Http\Controllers\Admin\Catalogs\Country;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Country\Entities\Country;

/* REPOSITORIES */
use App\Country\Repositories\CountryRepo;

/* RESOURCE */
use App\Http\Resources\Country as CountryResource;

/* LIB */
use PDF;
use Image;

class CountryController extends ApiController
{
    private $countryRepo;

    public function __construct( CountryRepo $countryRepo )
    {
        $this->countryRepo = $countryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.countries.index');
    }

    /**
     * Get data Country.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataCountry(Request $request)
    {

        $sort = $request->sort['sort'];
        $countries = $this->countryRepo->getAll($sort);
        
        return CountryResource::collection($countries);
    }

    /**
     * Get country by id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCountryById(Request $request, Country $country)
    {
        return $country;
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

        $country = $this->countryRepo->createCountry($data);

        return redirect()->back()->with('message_success', 'Pais agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $data['country'] = $country;
        
        return view('admin.catalogs.countries.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Country $country)
    {
        $data['country'] = $country;
        
        return view('admin.catalogs.countries.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {

        $country->update([
            'name'        => $request->name,
            'code'        => $request->code
        ]);

        $country->save();

        return redirect()->route('countries')->with('message_success', 'Pais actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Country $country)
    {
        $country->delete();
    }
}
