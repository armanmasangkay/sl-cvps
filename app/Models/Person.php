<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $with=['vaccinations'];

    protected $table = 'people';

    protected $fillable=[
        'category',
        'qr_code',
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

    private function convertDateToCarbon($stringDate)
    {
        return Carbon::createFromFormat('Y-m-d', $this->birth_date);
    }

    public function birthday()
    {
       return $this->convertDateToCarbon($this->birth_date)->format('M-d-Y');

    }

    public function fullnameFormal()
    {
        return "{$this->lastname}, {$this->firstname}";
    }

    public function address()
    {
        return "{$this->loc_brgy}, {$this->loc_muni}, {$this->loc_prov}";
    }

    public function hasQrCode()
    {
        return $this->qr_code ? true : false;
    }
}
