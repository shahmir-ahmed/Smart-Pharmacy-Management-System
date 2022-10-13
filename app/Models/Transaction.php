<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_bill',
        'transaction_paid_amount',
        'transaction_payment_method'
    ];

    protected $primaryKey = 'transaction_id';
}
