<?php

namespace App\Filament\Resources\CategorieResource\Pages;

use App\Filament\Resources\CategorieResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCategories extends ManageRecords
{
    protected static string $resource = CategorieResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
