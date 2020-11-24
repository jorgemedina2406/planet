<?php

namespace App\Http\Controllers\Admin\Consolidated;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Consolidated\Entities\Consolidated;
use App\Product\Entities\Product;
use App\Country\Entities\Country;
use App\Courier\Entities\Courier;

/* REPOSITORIES */
use App\Consolidated\Repositories\ConsolidatedRepo;

/* RESOURCE */
use App\Http\Resources\Consolidated as ConsolidatedResource;

/* LIB */
use PDF;
use Image;

class ConsolidatedController extends ApiController
{
    private $consolidatedRepo;

    public function __construct( ConsolidatedRepo $consolidatedRepo )
    {
        $this->consolidatedRepo = $consolidatedRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['couriers'] = Courier::all();

        return view('admin.consolidated.index', $data);
    }

    /**
     * View create consolidated.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products']  = Product::all();
        $data['countries'] = Country::all();
        $data['couriers']  = Courier::all();

        return view('admin.consolidated.create', $data);
    }

    /**
     * Get data Consolidated.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataConsolidated(Request $request)
    {
        $sort = $request->sort['sort'];
        $consolidated = $this->consolidatedRepo->getAll($sort);
        
        return ConsolidatedResource::collection($consolidated);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataConsolidated = $request->all();

        $consolidated = $this->consolidatedRepo->createConsolidated($dataConsolidated);

        return redirect()->route('consolidated')->with('message_success', 'Consolidacion agregada exitosamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consolidated $consolidated)
    {
        $data['consolidated'] = $consolidated;
        $data['countries'] = Country::all();
        $data['products']  = Product::all();
        $data['couriers']  = Courier::all();

        return view('admin.consolidated.edit', $data);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Consolidated $consolidated)
    {
        $data['consolidated'] = $consolidated;

        $data['countries'] = Country::all();
        $data['products']  = Product::all();
        $data['couriers']  = Courier::all();

        return view('admin.consolidated.view', $data);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportPdf(Consolidated $consolidated)
    {
        $data['consolidated'] = $consolidated;

        $data['countries'] = Country::all();
        $data['products']  = Product::all();
        $data['couriers']  = Courier::all();

        $pdf = PDF::loadView('admin.consolidated.pdf', $data);

        return $pdf->download('desref'.$consolidated->des.'.pdf');    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consolidated $consolidated)
    {
        $consolidated->update([
            'des'               => $request->des,
            'guie'              => $request->guie,
            'hawbs'             => $request->hawbs,
            'hawbs_delivered'   => $request->hawbs_delivered,
            'hawns_planet'      => $request->hawns_planet,
            'date_notification' => $request->date_notification,
            'courier_id'        => $request->courier_id
        ]);

        $consolidated->save();

        return redirect()->route('consolidated')->with('message_success', 'Consolidacion actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Consolidated $consolidated)
    {
        $consolidated->delete();
    }
}
