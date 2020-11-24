<?php

namespace App\Http\Controllers\Admin\Catalogs\Exporter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Exporter\Entities\Exporter;
use App\Country\Entities\Country;

/* REPOSITORIES */
use App\Exporter\Repositories\ExporterRepo;

/* RESOURCE */
use App\Http\Resources\Exporter as ExporterResource;

/* LIB */
use PDF;
use Image;

class ExporterController extends ApiController
{
    private $exporterRepo;

    public function __construct( ExporterRepo $exporterRepo )
    {
        $this->exporterRepo = $exporterRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::orderBy('orden')->get();

        return view('admin.catalogs.exporters.index', $data);
    }

    /**
     * Get data Exporter.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataExporter(Request $request)
    {

        $sort = $request->sort['sort'];
        $exporters = $this->exporterRepo->getAll($sort);
        
        return ExporterResource::collection($exporters);
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

        $exporter = $this->exporterRepo->createExporter($data);

        return redirect()->back()->with('message_success', 'Exportador agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exporter $exporter)
    {
        $data['exporter'] = $exporter;
        $data['countries'] = Country::orderBy('orden')->get();
        
        return view('admin.catalogs.exporters.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Exporter $exporter)
    {
        $data['exporter'] = $exporter;
        $data['countries'] = Country::orderBy('orden')->get();
        
        return view('admin.catalogs.exporters.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exporter $exporter)
    {

        $exporter->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'street'         => $request->street,
            'nro_ext'        => $request->nro_ext,
            'nro_int'        => $request->nro_int,
            'colony'         => $request->colony,
            'municipality'   => $request->municipality,
            'federal_entity' => $request->federal_entity,
            'postal'         => $request->postal,
            'country_id'     => $request->country_id
        ]);

        $exporter->save();

        return redirect()->route('exporters')->with('message_success', 'Exportador actualizado');

    }

    public function getExporterByName(Request $request)
    {

        $exporter = Exporter::where('name', $request->name)->first();

        if( $exporter ) {

            return response()->json('Existe');

        }else {
            return response()->json('No Existe');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Exporter $exporter)
    {
        $exporter->delete();
    }
}
