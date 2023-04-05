<?php

namespace App\Filament\Resources\BoutiqueResource\Pages;

use App\Filament\Resources\BoutiqueResource;
use App\Models\Boutique;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;

class ManageBoutiques extends ManageRecords
{
    protected static string $resource = BoutiqueResource::class;

    public function getTableQuery(): Builder
    {
        return Boutique::query()
            ->when(auth()->user()->hasRole('GERANT_BOUTIQUE'), function($builder){
               return $builder->whereIn('id', auth()->user()->boutiques()->pluck('id')->toArray());
            });
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
