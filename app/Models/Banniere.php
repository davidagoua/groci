<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banniere extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function boutique(): BelongsTo
    {
        return $this->belongsTo(Boutique::class);
    }
}
