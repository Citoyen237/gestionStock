<?php

namespace App\Models;

use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'total',
        'type',
        'code_fac',
    ];

    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }

    public function fournisseur():BelongsTo{
        return $this->belongsTo(Fournisseur::class);
    }
}
