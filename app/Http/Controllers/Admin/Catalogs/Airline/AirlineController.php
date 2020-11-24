<?php

namespace App\Http\Controllers\Admin\Catalogs\Airline;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Airline\Entities\Airline;

/* REPOSITORIES */
use App\Airline\Repositories\AirlineRepo;

/* RESOURCE */
use App\Http\Resources\Airline as AirlineResource;

/* LIB */
use PDF;
use Image;

class AirlineController extends ApiController
{
    private $airlineRepo;

    public function __construct( AirlineRepo $airlineRepo )
    {
        $this->airlineRepo = $airlineRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.airlines.index');
    }

    /**
     * Get data Cr.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataAirline(Request $request)
    {

        $sort = $request->sort['sort'];

        $airlines = $this->airlineRepo->getAll($sort);
        
        return AirlineResource::collection($airlines);
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

        $airline = $this->airlineRepo->createAirline($data);

        return redirect()->back()->with('message_success', 'Linea aerea agregada');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        $data['airline'] = $airline;
        
        return view('admin.catalogs.airlines.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Airline $airline)
    {
        $data['airline'] = $airline;
        
        return view('admin.catalogs.airlines.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airline $airline)
    {

        $airline->update([
            'name'   => $request->name
        ]);

        $airline->save();

        return redirect()->route('airlines')->with('message_success', 'Linea aerea actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Airline $airline)
    {
        $airline->delete();
    }
}
