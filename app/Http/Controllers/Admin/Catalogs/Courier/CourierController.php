<?php

namespace App\Http\Controllers\Admin\Catalogs\Courier;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Courier\Entities\Courier;
use App\Country\Entities\Country;

/* REPOSITORIES */
use App\Courier\Repositories\CourierRepo;

/* RESOURCE */
use App\Http\Resources\Courier as CourierResource;

/* LIB */
use PDF;
use Image;

class CourierController extends ApiController
{
    private $courierRepo;

    public function __construct( CourierRepo $courierRepo )
    {
        $this->courierRepo = $courierRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::all();

        return view('admin.catalogs.couriers.index', $data);
    }

    /**
     * Get data Cr.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataCourier(Request $request)
    {

        $sort = $request->sort['sort'];
        $couriers = $this->courierRepo->getAll($sort);
        
        return CourierResource::collection($couriers);
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

        $courier = $this->courierRepo->createCourier($data);

        return redirect()->back()->with('message_success', 'Courier agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        $data['courier']   = $courier;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.couriers.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Courier $courier)
    {
        $data['courier'] = $courier;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.couriers.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {

        $courier->update([
            'name'       => $request->name,
            'city'       => $request->city,
            'postal'     => $request->postal,
            'country_id' => $request->country_id
        ]);

        $courier->save();

        return redirect()->route('couriers')->with('message_success', 'Courier actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Courier $courier)
    {
        $courier->delete();
    }
}
