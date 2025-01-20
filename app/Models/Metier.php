<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'metiers';

    protected $fillable = [
        'name',
        'cnae_code'
    ];
}
