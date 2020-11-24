<?php

namespace App\Http\Controllers\Admin\Catalogs\Patent;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Patent\Entities\Patent;

/* REPOSITORIES */
use App\Patent\Repositories\PatentRepo;

/* RESOURCE */
use App\Http\Resources\Patent as PatentResource;

/* LIB */
use PDF;
use Image;

class PatentController extends ApiController
{
    private $patentRepo;

    public function __construct( PatentRepo $patentRepo )
    {
        $this->patentRepo = $patentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.patents.index');
    }

    /**
     * Get data Patent.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataPatent(Request $request)
    {

        $sort = $request->sort['sort'];
        $patents = $this->patentRepo->getAll($sort);
        
        return PatentResource::collection($patents);
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

        $patent = $this->patentRepo->createPatent($data);

        return redirect()->back()->with('message_success', 'Patente agregada');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patent $patent)
    {
        $data['patent'] = $patent;
        
        return view('admin.catalogs.patents.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Patent $patent)
    {
        $data['patent'] = $patent;
        
        return view('admin.catalogs.patents.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patent $patent)
    {

        $patent->update([
            'patent'          => $request->patent,
            'agent_aduanal' => $request->agent_aduanal
        ]);

        $patent->save();

        return redirect()->route('patents')->with('message_success', 'Patente actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Patent $patent)
    {
        $patent->delete();
    }
}
