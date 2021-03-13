<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable=[
        'category',
        'category_id',
        'category_id_num',
        'philhealth_id',
        'pwd_id',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'contact_num',
        'loc_region',
        'loc_prov',
        'loc_muni',
        'loc_brgy',
        'sex',
        'birth_date'
    ];

    public function isVaccinated()
    {
        if($this->vaccination->count()<=0){
            return false;
        }
        return true;
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }

}
