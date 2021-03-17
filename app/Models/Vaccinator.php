<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinator extends Model
{
    use HasFactory;

    protected $fillable=[
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'position',
        'role',
        'facility_id',
        'prc',
        'municipality_id'
    ];

    public function facility()
    {
        return $this->hasOne(Facility::class,'id', 'facility_id');
    }

    public function fullname()
    {
        return "{$this->firstname} {$this->middlename} {$this->lastname} {$this->suffix}";
    }
}
