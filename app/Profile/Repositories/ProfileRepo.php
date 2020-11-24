<?php
namespace App\Profile\Repositories;

use App\Profile\Entities\Profile;

/**
 * Class ProfileRepo
 *
 * @package App\Profile\Repositories
 * @author  Jorge Medina
 */
class ProfileRepo
{
    public function createProfile($data)
    {
        return Profile::create($data);
    }

    public function getProfile($user)
    {
        return Profile::where('user_id', $user)->firstOrFail();

    }

}
