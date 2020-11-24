<?php

namespace App\Http\Controllers\Admin\Catalogs\Consignee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Consignee\Entities\Consignee;
use App\Country\Entities\Country;

/* REPOSITORIES */
use App\Consignee\Repositories\ConsigneeRepo;

/* RESOURCE */
use App\Http\Resources\Consignee as ConsigneeResource;

/* LIB */
use PDF;
use Image;

class ConsigneeController extends ApiController
{
    private $consigneeRepo;

    public function __construct( ConsigneeRepo $consigneeRepo )
    {
        $this->consigneeRepo = $consigneeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::all();

        return view('admin.catalogs.consignatories.index', $data);
    }

    /**
     * Get data Consignee.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataConsignee(Request $request)
    {

        $sort = $request->sort['sort'];
        $consignatories = $this->consigneeRepo->getAll($sort);
        
        return ConsigneeResource::collection($consignatories);
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

        $consignee = $this->consigneeRepo->createConsignee($data);

        return redirect()->back()->with('message_success', 'Consignatorio agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consignee $consignee)
    {
        $data['consignee'] = $consignee;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.consignatories.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Consignee $consignee)
    {
        $data['consignee'] = $consignee;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.consignatories.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consignee $consignee)
    {

        $consignee->update([
            'name'           => $request->name,
            'street'         => $request->street,
            'nro_ext'        => $request->nro_ext,
            'nro_int'        => $request->nro_int,
            'colony'         => $request->colony,
            'municipality'   => $request->municipality,
            'federal_entity' => $request->federal_entity,
            'postal'         => $request->postal,
            'country_id'     => $request->country_id
        ]);

        $consignee->save();

        return redirect()->route('consignatories')->with('message_success', 'Consignatorio actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Consignee $consignee)
    {
        $consignee->delete();
    }
}
