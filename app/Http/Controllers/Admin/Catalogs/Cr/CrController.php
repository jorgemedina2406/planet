<?php

namespace App\Http\Controllers\Admin\Catalogs\Cr;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Cr\Entities\Cr;

/* REPOSITORIES */
use App\Cr\Repositories\CrRepo;

/* RESOURCE */
use App\Http\Resources\Cr as CrResource;

/* LIB */
use PDF;
use Image;

class CrController extends ApiController
{
    private $crRepo;

    public function __construct( CrRepo $crRepo )
    {
        $this->crRepo = $crRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.crs.index');
    }

    /**
     * Get data Cr.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataCr(Request $request)
    {

        $sort = $request->sort['sort'];
        $crs = $this->crRepo->getAll($sort);
        
        return CrResource::collection($crs);
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

        $cr = $this->crRepo->createCr($data);

        return redirect()->back()->with('message_success', 'Cr agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cr $cr)
    {
        $data['cr'] = $cr;
        
        return view('admin.catalogs.crs.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Cr $cr)
    {
        $data['cr'] = $cr;
        
        return view('admin.catalogs.crs.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cr $cr)
    {

        $cr->update([
            'name'   => $request->name,
            'code'   => $request->code
        ]);

        $cr->save();

        return redirect()->route('crs')->with('message_success', 'Cr actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cr $cr)
    {
        $cr->delete();
    }
}
