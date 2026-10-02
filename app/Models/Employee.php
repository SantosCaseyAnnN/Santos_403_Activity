<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_number',
        'position',
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_hired',
    ];

    protected $casts = [
        'date_hired' => 'date',
    ];
}
