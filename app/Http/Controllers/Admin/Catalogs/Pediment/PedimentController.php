<?php

namespace App\Http\Controllers\Admin\Catalogs\Pediment;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Pediment\Entities\Pediment;

/* REPOSITORIES */
use App\Pediment\Repositories\PedimentRepo;

/* RESOURCE */
use App\Http\Resources\Pediment as PedimentResource;

/* LIB */
use PDF;
use Image;

class PedimentController extends ApiController
{
    private $pedimentRepo;

    public function __construct( PedimentRepo $pedimentRepo )
    {
        $this->pedimentRepo = $pedimentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.pediments.index');
    }

    /**
     * Get data Pediment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataPediment(Request $request)
    {

        $sort = $request->sort['sort'];
        $pediments = $this->pedimentRepo->getAll($sort);
        
        return PedimentResource::collection($pediments);
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
        $data['status'] = 'activado';

        $pediment = $this->pedimentRepo->createPediment($data);

        return redirect()->back()->with('message_success', 'Pedimento agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pediment $pediment)
    {
        $data['pediment'] = $pediment;
        
        return view('admin.catalogs.pediments.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Pediment $pediment)
    {
        $data['pediment'] = $pediment;
        
        return view('admin.catalogs.pediments.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pediment $pediment)
    {

        $pediment->update([
            'pediment' => $request->pediment,
        ]);

        $pediment->save();

        return redirect()->route('pediments')->with('message_success', 'Pedimento actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pediment $pediment)
    {
        $pediment->delete();
    }
}
