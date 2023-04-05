<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\ModelStatus\HasStatuses;

class Ligne extends Model
{
    use HasFactory, HasStatuses;
    protected $guarded = [];

    public function panier(): BelongsTo
    {
        return $this->belongsTo(Panier::class);
    }

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
}
