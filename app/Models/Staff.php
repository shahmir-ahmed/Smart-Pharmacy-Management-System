<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // Fillable field in DB

    protected $fillable =[
        'staff_name',
        'staff_position',
        'staff_salary',
        'staff_contact'    
    ];

    // primary key for the table
    protected $primaryKey = 'staff_id';
}
