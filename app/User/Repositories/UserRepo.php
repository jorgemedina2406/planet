<?php
namespace App\User\Repositories;

use App\User\Entities\User;

/**
 * Class UserRepo
 *
 * @package App\User\Repositories
 * @author  Jorge Medina
 */
class UserRepo
{
    
    public function createUser($data)
    {
        return User::create($data);
    }
    
    public function getAll()
    {
       return User::all()->where('role', '!=', 'Usuario');
    }
    
    public function getAllAdmin()
    {
       return User::all()->where('role', 1);
    }

    public function verifyUser($token)
    {
        
        $user = User::where('verification_token', $token)->firstOrFail();

        $user->verified           = User::USER_NOT_VERIFIED;
        $user->verification_token = null;

        $user->save();
        
    }

    public function getUserByEmail($email)
    {
        return $user = User::where('email', $email)->first();
    }

    public function getUser($userId) {
        return User::where('id', $userId)->firstOrFail();
    }

}
