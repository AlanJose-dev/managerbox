<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
 use Spatie\Permission\Traits\HasRoles;

 class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'phone_number',
        'is_active',
        'last_activity',
        'profile_picture',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_activity' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'is_responsible_by_company' => 'boolean',
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function registeredItemsInStock()
    {
        return $this->hasMany(ItemInStock::class, 'user_id');
    }

    public function movementsAsResponsible()
    {
        return $this->hasMany(StockMovement::class, 'user_id');
    }

    public function registeredSuppliers()
    {
        return $this->hasMany(Supplier::class, 'user_id');
    }
}
