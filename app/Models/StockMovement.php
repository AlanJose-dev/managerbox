<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Enums\Models\StockMovementTypeEnum;

class StockMovement extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movement_type',
        'quantity',
        'observations',
        'item_id',
        'user_id',
        'supplier_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quantity' => 'float',
        'movement_type' => 'string',
    ];

    /**
     * Define the relationship with the ItemInStock model.
     */
    public function item()
    {
        return $this->belongsTo(ItemInStock::class);
    }

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Supplier model.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class)->nullable();
    }
}
