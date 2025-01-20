<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'zipcode',
        'country',
        'addressable_type',
        'addressable_id',
    ];

    public function addressable()
    {
        return $this->morphTo('addressable');
    }

    public function scopeCompany($query)
    {
        return $query->where('addressable_type', Company::class);
    }

    public function scopeUser($query)
    {
        return $query->where('addressable_type', User::class);
    }

    public function scopeSupplier($query)
    {
        return $query->where('addressable_type', Supplier::class);
    }
}
