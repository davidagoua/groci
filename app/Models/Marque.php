<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Marque extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    public function produits(): HasMany
    {
        return $this->hasMany(Marque::class);
    }
}
