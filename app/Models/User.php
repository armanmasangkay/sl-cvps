<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        'municipality_id',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function userExist($username)
    {
        return Admin::where('username', '=', $username)->exists();
    }

    public function fullname()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function fullnameFormal()
    {
        return "{$this->last_name}, {$this->first_name}";
    }

    public function allowIf($allowedRole)
    {
        return $this->role!=$allowedRole?abort(403,"You do not have permission to access this page."):null;
    }

     public function municipality()
     {
         return $this->hasOne(Municipality::class,'id', 'municipality_id');
     }
}
