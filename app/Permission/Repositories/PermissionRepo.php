<?php
namespace App\Permission\Repositories;

use App\Permission\Entities\Permission;

/**
 * Class PermissionRepo
 *
 * @package App\Permission\Repositories
 * @author  Jorge Medina
 */
class PermissionRepo
{
    public function createPermission($data)
    {
        $permission = Permission::create($data);

        return $permission;
    }
    
    public function getAll($sort)
    {

        if( $sort === 'desc' ) {
            return Permission::all()->sortByDesc('name');
        }else{
            return Permission::all()->sortBy('name');
        }
    }

}
