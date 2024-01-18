<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Categorie extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'parent_id');
    }

    public static function booted()
    {
        self::saving(function($model){
            $model->slug = Str::slug($model->name);
        });
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeEnfant($query)
    {
        return$query->whereNotNull('parent_id');
    }
}
