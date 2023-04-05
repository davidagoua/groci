<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Spatie\ModelStatus\HasStatuses;

class Livraison extends Model
{
    use HasFactory, HasStatuses;
    protected $guarded = [];

    public function panier(): BelongsTo
    {
        return $this->belongsTo(Panier::class);
    }

    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Panier::class);
    }


}
