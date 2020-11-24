<?php

namespace App\Http\Controllers\Admin\Catalogs\Protocol;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Protocol\Entities\Protocol;

/* REPOSITORIES */
use App\Protocol\Repositories\ProtocolRepo;

/* RESOURCE */
use App\Http\Resources\Protocol as ProtocolResource;

/* LIB */
use PDF;
use Image;

class ProtocolController extends ApiController
{
    private $protocolRepo;

    public function __construct( ProtocolRepo $protocolRepo )
    {
        $this->protocolRepo = $protocolRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.protocols.index');
    }

    /**
     * Get data Cr.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataProtocol(Request $request)
    {

        $sort = $request->sort['sort'];
        $protocols = $this->protocolRepo->getAll($sort);
        
        return ProtocolResource::collection($protocols);
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

        $protocol = $this->protocolRepo->createProtocol($data);

        return redirect()->back()->with('message_success', 'Protocolo agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Protocol $protocol)
    {
        $data['protocol'] = $protocol;
        
        return view('admin.catalogs.protocols.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Protocol $protocol)
    {
        $data['protocol'] = $protocol;
        
        return view('admin.catalogs.protocols.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Protocol $protocol)
    {

        $protocol->update([
            'name'   => $request->name
        ]);

        $protocol->save();

        return redirect()->route('protocols')->with('message_success', 'Protocolo actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Protocol $protocol)
    {
        $protocol->delete();
    }
}
