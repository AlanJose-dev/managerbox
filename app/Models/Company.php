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
        'email',
        'foundation_date',
        'is_active',
        'metier_id',
        'user_id',
    ];

    protected $casts = [
        'foundation_date' => 'date',
        'is_active' => 'boolean',
    ];
}
