<?php

namespace App\Http\Middleware;
use App\Security\Repositories\PermissionsRepo;
use App\Security\Repositories\RolesRepo;
use App\Security\Enums\Permissions;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(\Auth::user()){
            
        // $permissions = collect();
        // $rolesRepo = new RolesRepo;

        // $roles = $rolesRepo->userRoles(\Auth::user()->id, $field = 'id');

        // $permissionsRepo = new PermissionsRepo;
        // $additional_permissions = $permissionsRepo->additionalPermissions(\Auth::user()->id);

        // foreach ($roles as $role) {
        //     foreach ($role->permissions as $permission) {
        //         $permissions->push($permission->id);
        //     }
        // }

        // foreach ($additional_permissions as $permission) {
        //     $permissions->push($permission->id);
        // }

        // $unique_permissions = $permissions->unique()->values()->all();

        //      if (in_array(Permissions::$admin, $unique_permissions)) {
        //             return $next($request);
        //      }
        //  }

        $role = \Auth::user()->role;
                    
             if ( $role === 'Administrador' ) {
                    return $next($request);
             }
         }

        return redirect()->route('dashboard');
    }
}
