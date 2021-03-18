<?php

namespace App\Http\Controllers;
use App\Classes\Facades\User as UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SetupControlller extends Controller
{
    private const MAASIN_ID=7;


    public function init()
    {
        $numberOfSuperAdmin=User::where('role',UserRole::SUPER_ADMIN)->count();

        if($numberOfSuperAdmin<=0){
            User::create([
                'first_name'=>'Super',
                'last_name'=>'Admin',
                'username'=>'super',
                'password'=>Hash::make('1234'),
                'municipality_id'=>self::MAASIN_ID,
                'role'=>UserRole::SUPER_ADMIN
            ]);
        }
        return redirect(route('user.login'));

    }
}
