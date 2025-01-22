<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Supplier extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $table = 'suppliers';

    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'cnpj',
        'cpf',
        'email',
        'phone_number',
        'is_active',
        'company_id',
        'user_id'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function responsibleByRegistering()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function itemsInStock()
    {
        return $this->hasMany(ItemInStock::class, 'supplier_id');
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class, 'supplier_id');
    }
}
