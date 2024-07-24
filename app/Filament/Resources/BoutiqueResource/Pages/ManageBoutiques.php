<?php

namespace App\Filament\Resources\BoutiqueResource\Pages;

use App\Filament\Resources\BoutiqueResource;
use App\Models\Boutique;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;

class ManageBoutiques extends ManageRecords
{
    protected static string $resource = BoutiqueResource::class;

    public function getTableQuery(): Builder
    {
        return Boutique::query()
            ->when(auth()->user()->hasRole('GERANT_BOUTIQUE'), function(Builder $query){
                return $query->where('user_id', auth()->id());
            });
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->using(function($data){
                $coord = $data['coord'];
                unset($data['coord']);
                $MODEL = static::getModel();
                $boutique = new $MODEL($data);
                $boutique->user_id = auth()->id();
                $boutique->lat = $coord['lat'];
                $boutique->lng = $coord['lng'];
                $boutique->save();
            })->label("Créer un boutique"),
            Actions\Action::make('importer')
                ->label("Importer des boutiques"),
        ];
    }
}
