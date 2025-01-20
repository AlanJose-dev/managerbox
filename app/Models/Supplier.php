<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'suppliers';

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
}
