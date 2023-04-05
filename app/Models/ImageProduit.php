<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageProduit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
