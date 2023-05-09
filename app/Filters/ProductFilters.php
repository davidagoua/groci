<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilters
{
    public function apply($query, $data)
    {
        if(isset($data['categorie'])){
            $query->whereIn('categorie_id', [$data['categorie']]);
        }
        if( isset($data['cats']) ){
            if(count(array_filter($data['cats']))){
                $query->whereIn('categorie_id', $data['cats']);
            }
        }
        if(request()->filled('prix_max')){
            $query->whereHas('propositions', function(Builder $q){
                return $q->where(column: 'prix', operator: '<=', value: request()->filled('prix_max'));
            });
        }
        if(request()->filled('prix_min')){
            $query->whereHas('propositions', function(Builder $q){
                return $q->where(column: 'prix', operator: '>=', value: request()->filled('prix_min'));
            });
        }
        if(request()->filled('boutiques_filters')){
            if(count(array_filter(request()->get('boutiques_filters')))){
                $query->whereHas('propositions', function(Builder $q){
                    return $q->whereIn('boutique_id', request()->get('boutiques_filters'));
                });
            }
        }

        return $query;
    }
}
