<?php

namespace App\Actions;

use App\Models\Produit;
use App\Models\Proposition;
use Lorisleiva\Actions\Concerns\AsAction;

class AddCart
{
    use AsAction;

    public function handle(Proposition $produit, int $quantity=1)
    {
        $panier = session()->get('panier') ?? collect([]);

        if($panier->contains($produit->id)){
            $panier[$produit->id] = $panier[$produit->id] + 1;
        }else{
            $panier[$produit->id] = 1;
        }
        session()->put('panier', $panier);
        session()->flash('info', "Produit ajouté au panier !");
    }
}
