<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Fillable fields in DB
    protected $fillable = [
        'stock_quantity',
        'stock_cost_price',
        'stock_medicine_id',
    ] ;

    // primary key for the table
    protected $primaryKey = 'stock_id';

    // timestamps
    const CREATED_AT = 'stock_created_at';
    const UPDATED_AT = 'stock_updated_at';
}
