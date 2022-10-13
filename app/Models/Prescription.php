<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_prescribed_by',
        'prescription_disease',
        // 'prescription_customer_id',
        'patient_name',
        'patient_age',
        // 'customer_gender'
    ];

    protected $primaryKey = 'prescription_id';
}
