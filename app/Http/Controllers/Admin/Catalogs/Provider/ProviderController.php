<?php

namespace App\Http\Controllers\Admin\Catalogs\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Provider\Entities\Provider;
use App\Country\Entities\Country;

/* REPOSITORIES */
use App\Provider\Repositories\ProviderRepo;

/* RESOURCE */
use App\Http\Resources\Provider as ProviderResource;

/* LIB */
use PDF;
use Image;

class ProviderController extends ApiController
{
    private $providerRepo;

    public function __construct( ProviderRepo $providerRepo )
    {
        $this->providerRepo = $providerRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::all();

        return view('admin.catalogs.providers.index', $data);
    }

    /**
     * Get data Provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataProvider(Request $request)
    {

        $sort = $request->sort['sort'];
        $providers = $this->providerRepo->getAll($sort);
        
        return ProviderResource::collection($providers);
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

        $provider = $this->providerRepo->createProvider($data);

        return redirect()->back()->with('message_success', 'Proveedor agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $data['provider'] = $provider;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.providers.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Provider $provider)
    {
        $data['provider'] = $provider;
        $data['countries'] = Country::all();
        
        return view('admin.catalogs.providers.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {

        $importer->update([
            'name'           => $request->name,
            'street'         => $request->street,
            'nro_ext'        => $request->nro_ext,
            'nro_int'        => $request->nro_int,
            'colony'         => $request->colony,
            'municipality'   => $request->municipality,
            'federal_entity' => $request->federal_entity,
            'postal'         => $request->postal,
            'country'        => $request->country
        ]);

        $importer->save();

        return redirect()->route('providers')->with('message_success', 'Proveedor actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Provider $provider)
    {
        $provider->delete();
    }
}
