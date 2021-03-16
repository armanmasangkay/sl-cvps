<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function checkMunicipalityExist($municipality)
    {
        return Municipality::where('name', '=', $municipality)->exists();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
