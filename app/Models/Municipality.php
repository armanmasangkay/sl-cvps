<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipality_name'
    ];

    public static function checkMunicipalityExist($municipality)
    {
        return Municipality::where('municipality_name', '=', $municipality)->exists();
    }
}
