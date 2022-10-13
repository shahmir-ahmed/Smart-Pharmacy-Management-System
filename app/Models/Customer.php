<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_gender',
        'customer_age',
        'customer_contact'
    ];

    protected $primaryKey = 'customer_id';
}
