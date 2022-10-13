<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    // Fillable fields in DB

    protected $fillable = [
        'medicine_name',
        'medicine_type',
        'medicine_dose',
        'medicine_price',
        'medicine_expiry_date',
        'medicine_company_name'
    ];

    // Primary key for the table

    protected $primaryKey = 'medicine_id';

        // timestamps
        const CREATED_AT = 'medicine_created_at';
        const UPDATED_AT = 'medicine_updated_at';
}
