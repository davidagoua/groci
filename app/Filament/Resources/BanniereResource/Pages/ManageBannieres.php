<?php

namespace App\Filament\Resources\BanniereResource\Pages;

use App\Filament\Resources\BanniereResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBannieres extends ManageRecords
{
    protected static string $resource = BanniereResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
