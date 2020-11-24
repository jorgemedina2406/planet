<?php

namespace App\Http\Controllers\Admin\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Config as ConfigResource;

//Entities
use App\Configs\Entities\Config;
use App\Country\Entities\Country;

class ConfigController extends ApiController
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Edit Configs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data['config'] = Config::find(1);
        $data['countries'] = Country::all();

        return view('admin.configs.edit', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        return new ConfigResource($config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $config = Config::find($request->id);

        if ($request->has('name')) {
            $config->name = $request->name;
        }

        if ($request->has('street')) {
            $config->street = $request->street;
        }

        if ($request->has('country')) {
            $config->country = $request->country;
        }

        if ($request->has('state')) {
            $config->state = $request->state;
        }

        if ($request->has('city')) {
            $config->city = $request->city;
        }

        if ($request->has('colony')) {
            $config->colony = $request->colony;
        }

        if ($request->has('nro_ext')) {
            $config->nro_ext = $request->nro_ext;
        }

        if ($request->has('nro_int')) {
            $config->nro_int = $request->nro_int;
        }

        $config->save();

        return redirect()->back()->with('message_success', 'Configuracion actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
