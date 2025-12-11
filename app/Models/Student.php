<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = [
        'stNo',
        'name',
        'email',
        'password',
        'department',
        'avg',
        'status'
    ];
}
