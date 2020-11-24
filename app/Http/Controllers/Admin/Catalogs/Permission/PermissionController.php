<?php

namespace App\Http\Controllers\Admin\Catalogs\Permission;

use App\User\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\ApiController;

/* ENTITIES */
use App\Permission\Entities\Permission;

/* REPOSITORIES */
use App\Permission\Repositories\PermissionRepo;

/* RESOURCE */
use App\Http\Resources\Permission as PermissionResource;

/* LIB */
use PDF;
use Image;

class PermissionController extends ApiController
{
    private $permissionRepo;

    public function __construct( PermissionRepo $permissionRepo )
    {
        $this->permissionRepo = $permissionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalogs.permissions.index');
    }

    /**
     * Get data Cr.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataPermission(Request $request)
    {

        $sort = $request->sort['sort'];
        $permissions = $this->permissionRepo->getAll($sort);
        
        return PermissionResource::collection($permissions);
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

        $permission = $this->permissionRepo->createPermission($data);

        return redirect()->back()->with('message_success', 'Permiso agregado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $data['permission'] = $permission;
        
        return view('admin.catalogs.permissions.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Permission $permission)
    {
        $data['permission'] = $permission;
        
        return view('admin.catalogs.permissions.view', $data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {

        $permission->update([
            'name'   => $request->name
        ]);

        $permission->save();

        return redirect()->route('permissions')->with('message_success', 'Permiso actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Permission $permission)
    {
        $permission->delete();
    }
}
