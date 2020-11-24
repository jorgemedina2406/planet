<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth; 
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Property as PropertyResource;
use App\Jobs\SendEmailRegister;

// REPOSITORIES
use App\User\Repositories\UserRepo;
use App\Profile\Repositories\ProfileRepo;

// ENTITIES
use App\User\Entities\User;
use App\Country\Entities\Country;


class UserController extends ApiController
{
    private $userRepo;
    private $profileRepo;

    public function __construct(ProfileRepo $profileRepo, UserRepo $userRepo)
    {
        $this->userRepo    = $userRepo;
        $this->profileRepo = $profileRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::all();

        return view('admin.users.index', $data);
    }

    /**
     * Get data User.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataUser()
    {
        $users = $this->userRepo->getAll();
        
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name'         => 'required',
            'lastname'     => 'required',
            'email'        => 'required|email',
            'password'     => 'required|min:6'
        ]);

        $data['email']              = $request->email;
        $data['password']           = bcrypt($request->password);
        $data['activated']          = User::USER_ACTIVATED;
        $data['role']               = $request->role;
        $data['verification_token'] = User::generateVerificationToken();

        $user    = $this->userRepo->createUser($data);

        $dataProfile['user_id']    = $user->id;
        $dataProfile['name']       = $request->name;
        $dataProfile['lastname']   = $request->lastname;
        $dataProfile['street']     = $request->street;
        $dataProfile['city']       = $request->city;
        $dataProfile['state']      = $request->state;
        $dataProfile['colony']     = $request->colony;
        $dataProfile['nro_ext']    = $request->nro_ext;
        $dataProfile['nro_int']    = $request->nro_int;
        $dataProfile['federal_entity'] = $request->federal_entity;
        $dataProfile['municipality'] = $request->municipality;
        $dataProfile['country']    = $request->country;
        $dataProfile['postal']     = $request->postal;

        $profile = $this->profileRepo->createProfile($dataProfile);

        return redirect()->back()->with('message_success','Usuario agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data['user'] = $user;
        $data['countries'] = Country::all();
        
        return view('admin.users.edit', $data);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(User $user)
    {
        $data['user'] = $user;
        $data['countries'] = Country::all();
        
        return view('admin.users.view', $data);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'email'    => 'email|unique:users,email,' . $user->id,
            // 'password' => 'min:6',
        ]);


        $profile = $this->profileRepo->getProfile($user->id);

        if ( $request->has('password') && $request->password !== null ) {
            $user->password = bcrypt($request->password);
        }

        if ($request->has('name')) {
            $profile->name = $request->name;
        }

        if ($request->has('lastname')) {
            $profile->lastname = $request->lastname;
        }

        if ($request->has('street')) {
            $profile->street = $request->street;
        }

        if ($request->has('city')) {
            $profile->city = $request->city;
        }

        if ($request->has('state')) {
            $profile->state = $request->state;
        }

        if ($request->has('municipality')) {
            $profile->municipality = $request->municipality;
        }

        if ($request->has('colony')) {
            $profile->colony = $request->colony;
        }

        if ($request->has('nro_ext')) {
            $profile->nro_ext = $request->nro_ext;
        }

        if ($request->has('nro_int')) {
            $profile->nro_int = $request->nro_int;
        }

        if ($request->has('federal_entity')) {
            $profile->federal_entity = $request->federal_entity;
        }

        if ($request->has('postal')) {
            $profile->postal = $request->postal;
        }

        if ($request->has('role')) {
            $user->role = $request->role;
        }

        if ( $user->isDirty() === false && $profile->isDirty() === false ) {
            return redirect()->back()->with('message_error','Se debe especificar al menos un valor diferente para actualizar');
        }

        $user->save();
        $profile->save();

        return redirect()->back()->with('message_success','Usuario actualizado');

    }

    public function setUserAdmin(User $user)
    {

        if ( $user->admin === 0 ) {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }

        $user->save();

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return new UserResource($user);
    }

}
