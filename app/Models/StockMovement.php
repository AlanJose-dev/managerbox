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

    public function itemInStock()
    {
        return $this->belongsTo(ItemInStock::class, 'item_in_stock_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function responsibleByRegistering()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
