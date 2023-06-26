<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Psy\CodeCleaner\ReturnTypePass;

class Depense extends Model
{
    use HasFactory;

    protected $fillable=[
        'motif',
        'montant',
        'user_id',
    ];

    public function user():BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}
