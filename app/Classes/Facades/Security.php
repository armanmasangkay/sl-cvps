<?php namespace App\Classes\Facades;

use App\Models\User;

class Security{

    public static function checkIfAuthorized(User $user,$allowedRole)
    {
        if($user->role!=$allowedRole){
            abort(403);
        }
    }
}