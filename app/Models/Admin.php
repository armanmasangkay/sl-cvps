<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        'municipality',
    ];

    public static function adminExist($username)
    {
        return Admin::where('username', '=', $username)->exists();
    }
}
