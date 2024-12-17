<?php

namespace App\Filament\Resources\Produit2Resource\Pages;

use App\Filament\Resources\Produit2Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduit2 extends EditRecord
{
    protected static string $resource = Produit2Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
