<?php

namespace App\Filament\Resources\MarqueResource\Pages;

use App\Filament\Resources\MarqueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMarques extends ManageRecords
{
    protected static string $resource = MarqueResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
