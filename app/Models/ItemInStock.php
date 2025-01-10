<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemInStock extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sku_code',
        'barcode',
        'name',
        'description',
        'unity_type',
        'current_quantity',
        'minimum_quantity',
        'cost_price',
        'sell_price',
        'location',
        'is_active',
        'company_id',
        'user_id',
    ];

    /**
     * Relacionamento com a empresa.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relacionamento com o usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
