<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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

    public function middleInitial()
    {
        return Str::substr($this->middlename,0,1).'.';
    }

    public function facility()
    {
        return $this->hasOne(Facility::class,'id', 'facility_id');
    }

    public function fullname()
    {
        return "{$this->firstname} {$this->middleInitial()} {$this->lastname} {$this->suffix}";
    }
}
