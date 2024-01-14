<?php

namespace App\Filament\Resources\BoutikTokenResource\Pages;

use App\Filament\Resources\BoutikTokenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBoutikTokens extends ManageRecords
{
    protected static ?string $title = "Clé d'API";
    protected static string $resource = BoutikTokenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
