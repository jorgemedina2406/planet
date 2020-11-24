<?php

namespace App\Http\Controllers\Admin\Catalogs\Airport;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Airport\Entities\Airport;
use App\Country\Entities\Country;

/* REPOSITORIES */
use App\Airport\Repositories\AirportRepo;

/* RESOURCE */
use App\Http\Resources\Airport as AirportResource;

/* LIB */
use PDF;
use Image;

class AirportController extends ApiController
{
    private $airportRepo;

    public function __construct( AirportRepo $airportRepo )
    {
        $this->airportRepo = $airportRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::all();

        return view('admin.catalogs.airports.index', $data);
    }

    /**
     * Get data Airport.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataAirport(Request $request)
    {

        $sort = $request->sort['sort'];
        $airports = $this->airportRepo->getAll($sort);
        
        return AirportResource::collection($airports);
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

        $airport = $this->airportRepo->createAirport($data);

        return redirect()->back()->with('message_success', 'Aeropuerto agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        $data['airport'] = $airport;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.airports.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Airport $airport)
    {
        $data['airport'] = $airport;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.airports.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airport $airport)
    {

        $airport->update([
            'name'       => $request->name,
            'code'       => $request->code,
            'country'    => $request->country,
            'city'       => $request->city,
        ]);

        $airport->save();

        return redirect()->route('airports')->with('message_success', 'Aeropuerto actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Airport $airport)
    {
        $airport->delete();
    }
}
