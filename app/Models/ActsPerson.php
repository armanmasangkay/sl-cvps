<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActsPerson extends Model
{
    use HasFactory;


    protected $table = 'person';
    protected $connection = 'mysql2';
}
