<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemInStockCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'item_in_stock_categories';

    protected $fillable = [
        'name',
        'description',
        'is_active',
        'company_id',
        'user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function responsibleByRegistering()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itemsInStock()
    {
        return $this->belongsTo(ItemInStock::class, 'item_in_stock_id');
    }
}
