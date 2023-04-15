<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Produit extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function Categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function Marque(): BelongsTo
    {
        return $this->belongsTo(Marque::class);
    }

    public static function booted()
    {
        self::addGlobalScope('actif', function($query){
           return $query->where('is_actif', true);
        });
    }

    public function propositions(): HasMany
    {
        return $this->hasMany(Proposition::class)->orderBy('prix');
    }

    public function image_produits(): HasMany
    {
        return $this->hasMany(ImageProduit::class);
    }

    public function image(): object
    {
        return $this->hasMany(ImageProduit::class)
            ->orderByDesc('created_at')
            ->first() ?? new ImageProduit();
    }

    public function boutiques()
    {
        return Boutique::whereHas('propositions', function($query) {
            $query->where('produit_id', $this->id);
        })->get();
    }

    public function searchableAs()
    {
        return 'produits_index';
    }

}
