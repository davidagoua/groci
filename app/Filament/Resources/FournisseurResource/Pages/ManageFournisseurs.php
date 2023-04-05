<?php

namespace App\Filament\Resources\FournisseurResource\Pages;

use App\Filament\Resources\FournisseurResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFournisseurs extends ManageRecords
{
    protected static string $resource = FournisseurResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
