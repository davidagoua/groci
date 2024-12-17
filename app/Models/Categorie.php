<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function sous_categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'sous_sous_categorie_id');
    }

    public function enfants(): HasMany
    {
        return $this->hasMany(Categorie::class, 'parent_id');
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

    public function scopeEnfant(Builder $query)
    {
        return $query->whereNotNull('parent_id')->orderBy('name');
    }

    public function getOrdreAttribute()
    {
        return $this->order != 0 ? $this->order : $this->categorie->order;
    }

    public function sous2Categories(): HasMany
    {
        return $this->hasMany(Categorie::class, 'parent_id')->whereGeneration(3);
    }


}
