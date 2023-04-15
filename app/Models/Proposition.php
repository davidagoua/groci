<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class LocaliteScope implements Scope{

    public function apply(Builder $builder, Model $model)
    {
        return $builder->whereHas('boutique', function(Builder $query){
            return $query->where('ville', session()->get('localite'));
        });
    }
}

class Proposition extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['boutique','produit'];

    public function boutique(): BelongsTo
    {
        return $this->belongsTo(Boutique::class);
    }

    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }

    protected static function booted()
    {
        parent::booted();

        if(session()->has('localite')){
            self::addGlobalScope(new LocaliteScope());
        }
    }
}
