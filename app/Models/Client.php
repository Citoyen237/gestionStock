<?php

namespace App\Models;

use id;
use App\Models\User;
use App\Models\Facture3;
use App\Models\Maintenance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function maintenances():HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

    public function facture2s():HasMany
    {
       return $this->hasMany(Facture3::class);
    }
}
