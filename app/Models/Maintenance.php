<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'serie',
        'taff_effectuer',
        'montant',
        'user_id',
        'client_id',
    ];

    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
