<?php

namespace App\Actions;

use App\Models\Produit;
use App\Models\Proposition;
use App\Models\StatePrix;
use Lorisleiva\Actions\Concerns\AsAction;

class SeedPropositions
{
    use AsAction;

    public function handle(array $boutique_ids, $data)
    {
        // get product himself
        $produit = Produit::query()->where('code_barre', $data['code_barre'])->first();

        if(!$produit->exists()){
            return;
        }

        foreach ($boutique_ids as $boutique_id) {
            $proposition = Proposition::query()->updateOrCreate([
                'boutique_id'=> $boutique_id,
                'produit_id'=> $produit->id,
                'code_pos'=> $data['code_pos'],
                'code_barre'=> $data['code_barre'],
            ],[
                'prix'=> (int)  $data['prix'],
            ]);

            StatePrix::query()->create([
                'proposition_id'=> $proposition->id,
                'value'=> (int)  $data['prix'],
                'produit_id'=> $produit->id,
                'boutique_id'=> $boutique_id
            ]);
        }

    }
}
