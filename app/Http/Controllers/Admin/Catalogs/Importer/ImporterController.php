<?php

namespace App\Http\Controllers\Admin\Catalogs\Importer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Importer\Entities\Importer;
use App\Country\Entities\Country;

/* REPOSITORIES */
use App\Importer\Repositories\ImporterRepo;

/* RESOURCE */
use App\Http\Resources\Importer as ImporterResource;

/* LIB */
use PDF;
use Image;

class ImporterController extends ApiController
{
    private $importerRepo;

    public function __construct( ImporterRepo $importerRepo )
    {
        $this->importerRepo = $importerRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::orderBy('orden')->get();

        return view('admin.catalogs.importers.index', $data);
    }

    /**
     * Get data Importer.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataImporter(Request $request)
    {

        $sort = $request->sort['sort'];
        $importers = $this->importerRepo->getAll($sort);
        
        return ImporterResource::collection($importers);
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

        $importer = $this->importerRepo->createImporter($data);

        return redirect()->back()->with('message_success', 'Importador agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Importer $importer)
    {
        $data['importer'] = $importer;
        $data['countries'] = Country::orderBy('orden')->get();
        
        return view('admin.catalogs.importers.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Importer $importer)
    {
        $data['importer'] = $importer;
        $data['countries'] = Country::orderBy('orden')->get();
        
        return view('admin.catalogs.importers.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Importer $importer)
    {

        $importer->update([
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

        $importer->save();

        return redirect()->route('importers')->with('message_success', 'Importador actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Importer $importer)
    {
        $importer->delete();
    }
}
