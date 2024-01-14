<?php

namespace App\Actions;

use App\Models\Proposition;
use App\Models\StatePrix;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\SimpleExcel\SimpleExcelReader;

class SeedingProduct
{
    use AsAction;

    public function handle(Array $data)
    {
        collect($data['products'])->each(function($row) use($data){
            $proposition = Proposition::query()->updateOrCreate([
                'boutique_id'=> $data['boutique_id'],
                'produit_id'=> $row['id_produit'],
                'code_pos'=> $row['code_pos'],
                'code_barre'=> $row['code_barre'],
            ],[
                'prix'=> (int) $row['prix'],
            ]);

            StatePrix::query()->create([
                'proposition_id'=> $proposition->id,
                'value'=> (int)  $row['prix'],
                'produit_id'=> $row['id_produit'],
                'boutique_id'=> $data['boutique_id']
            ]);
        });
    }
}
