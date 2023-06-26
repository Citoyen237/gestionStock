<?php

namespace App\Models;

use App\Models\Poste;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Maintenance;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'poste_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function poste(): BelongsTo
    {
        return $this->belongsTo(Poste::class);
    }

    public function clients():HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function maintenances():HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

    public function depenses():HasMany
    {
        return $this->hasMany(Depense::class);
    }

    public function fournisseurs():HasMany
    {
        return $this->hasMany(Fournisseur::class);
    }
}
