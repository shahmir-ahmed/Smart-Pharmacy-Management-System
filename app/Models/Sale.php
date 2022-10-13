<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_quantity',
        'sale_amount',
        'sale_medicine_id',
        'sale_prescription_id',
        'sale_transaction_id'
    ];

    protected $primaryKey = 'sale_id';

    // timestamps
    const CREATED_AT = 'sale_created_at';
    const UPDATED_AT = 'sale_updated_at';
}
