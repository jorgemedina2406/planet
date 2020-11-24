<?php

namespace App\Http\Controllers\Admin\Catalogs\Tax;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Tax\Entities\Tax;

/* REPOSITORIES */
use App\Tax\Repositories\TaxRepo;

/* RESOURCE */
use App\Http\Resources\Tax as TaxResource;

/* LIB */
use PDF;
use Image;

class TaxController extends ApiController
{
    private $taxRepo;

    public function __construct( TaxRepo $taxRepo )
    {
        $this->taxRepo = $taxRepo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        $data['tax'] = $tax;
        
        return view('admin.catalogs.taxs.index', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {

        $tax->update([
            'ige'        => $request->ige,
            'dta'        => $request->dta,
            'prv'        => $request->prv,
            'cnt'        => $request->cnt
        ]);

        $tax->save();

        return redirect()->back()->with('message_success', 'Impuesto actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tax $tax)
    {
        $tax->delete();
    }
}
