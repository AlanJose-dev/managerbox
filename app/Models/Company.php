<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'cnpj',
        'state_registration',
        'phone_number',
        'contact_email',
        'foundation_date',
        'is_active',
        'metier_id',
    ];

    protected $casts = [
        'foundation_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function metier()
    {
        return $this->belongsTo(Metier::class, 'metier_id');
    }

    public function owner()
    {
        return $this->hasOne(User::class, 'company_id')
        ->where('is_responsible_by_company', true);
    }


    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function itemsInStock()
    {
        return $this->hasMany(ItemInStock::class, 'company_id');
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class, 'company_id');
    }
}
