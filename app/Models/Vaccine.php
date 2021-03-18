<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccine_name',
        'batch_number',
        'lot_number',
        'vaccine_manufacturer',
        'municipality_id'
    ];

    public function details()
    {
        return "{$this->batch_number} | {$this->vaccine_name} ({$this->vaccine_manufacturer})";
    }

    public function postvaxes()
    {
        return $this->hasMany(PostVax::class);
    }
}
