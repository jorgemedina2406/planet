<?php

namespace App\Http\Controllers\Admin\Catalogs\Recognition;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Recognition\Entities\Recognition;

/* REPOSITORIES */
use App\Recognition\Repositories\RecognitionRepo;

/* RESOURCE */
use App\Http\Resources\Recognition as RecognitionResource;

/* LIB */
use PDF;
use Image;

class RecognitionController extends ApiController
{
    private $recognitionRepo;

    public function __construct( RecognitionRepo $recognitionRepo )
    {
        $this->recognitionRepo = $recognitionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.recognitions.index');
    }

    /**
     * Get data Recognition.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataRecognition(Request $request)
    {

        $sort = $request->sort['sort'];
        $recognitions = $this->recognitionRepo->getAll($sort);
        
        return RecognitionResource::collection($recognitions);
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

        $recognition = $this->recognitionRepo->createRecognition($data);

        return redirect()->back()->with('message_success', 'Reconocimiento aduanero agregada');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recognition $recognition)
    {
        $data['recognition'] = $recognition;
        
        return view('admin.catalogs.recognitions.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Recognition $recognition)
    {
        $data['recognition'] = $recognition;
        
        return view('admin.catalogs.recognitions.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recognition $recognition)
    {

        $currency->update([
            'name'   => $request->name
        ]);

        $currency->save();

        return redirect()->route('recognitions')->with('message_success', 'Reconocimiento aduanero actualizado');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recognition $recognition)
    {
        $recognition->delete();
    }
}
