<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poste extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom'
    ];
    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
