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
        if(!$this->middlename)
        {
            return "";
        }
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

    public function postvaxes()
    {
        return $this->hasMany(PostVax::class);
    }

    public function municipality()
    {
        return $this->hasOne(Municipality::class, 'id', 'municipality_id');
    }
}
