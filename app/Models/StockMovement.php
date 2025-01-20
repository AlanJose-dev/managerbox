<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockMovement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stock_movements';

    protected $fillable = [
        'movement_type',
        'quantity',
        'observations',
        'item_in_stock_id',
        'company_id',
        'user_id',
        'supplier_id',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
    ];
}
