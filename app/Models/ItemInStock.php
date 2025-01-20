<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemInStock extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'items_in_stock';

    protected $fillable = [
        'sku_code',
        'barcode',
        'name',
        'description',
        'unity_type',
        'current_quantity',
        'minimum_quantity',
        'brand',
        'cost_price',
        'sell_price',
        'location',
        'user_id',
        'category_id',
        'supplier_id',
    ];

    protected $casts = [
        'current_quantity' => 'decimal:2',
        'minimum_quantity' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
    ];
}
