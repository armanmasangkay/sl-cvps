<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_number',
        'lot_number',
        'vaccine_manufacturer',
        'municipality'
    ];
}
