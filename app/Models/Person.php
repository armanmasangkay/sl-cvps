<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code',
        'category',
        'category_id',
        'category_id_num',
        'philhealth_id',
        'pwd_id',
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'current_reside_reg',
        'current_reside_prov',
        'current_reside_mun',
        'current_reside_brgy',
        'sex',
        'birth_date'
    ];
}
