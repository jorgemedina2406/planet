<?php

namespace App\Http\Controllers\Admin\Catalogs\Incoterm;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Incoterm\Entities\Incoterm;

/* REPOSITORIES */
use App\Incoterm\Repositories\IncotermRepo;

/* RESOURCE */
use App\Http\Resources\Incoterm as IncotermResource;

/* LIB */
use PDF;
use Image;

class IncotermController extends ApiController
{
    private $incotermRepo;

    public function __construct( IncotermRepo $incotermRepo )
    {
        $this->incotermRepo = $incotermRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.incoterms.index');
    }

    /**
     * Get data Cr.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataIncoterm(Request $request)
    {

        $sort = $request->sort['sort'];
        $incoterms = $this->incotermRepo->getAll($sort);
        
        return IncotermResource::collection($incoterms);
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

        $incoterm = $this->incotermRepo->createIncoterm($data);

        return redirect()->back()->with('message_success', 'Incoterm agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Incoterm $incoterm)
    {
        $data['incoterm'] = $incoterm;
        
        return view('admin.catalogs.incoterms.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Incoterm $incoterm)
    {
        $data['incoterm'] = $incoterm;
        
        return view('admin.catalogs.incoterms.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incoterm $incoterm)
    {

        $incoterm->update([
            'name'   => $request->name
        ]);

        $incoterm->save();

        return redirect()->route('incoterms')->with('message_success', 'Incoterm actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Incoterm $incoterm)
    {
        $incoterm->delete();
    }
}
