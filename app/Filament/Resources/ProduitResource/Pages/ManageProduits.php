<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use App\Filament\Resources\ProduitResource;
use App\Models\Produit;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ManageProduits extends ManageRecords
{
    protected static string $resource = ProduitResource::class;


    public function getTableQuery(): Builder
    {
        return Produit::query()->withoutGlobalScope('actif');
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $images = $data['images'];
        unset($data['images']);
        foreach ($images as $image){
            $record->image_produits()->create([
                'path'=> $image
            ]);
        }
        $record->update($data);
        return $record;
    }


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->using(function(array $data){
                    $images = $data['images'];
                    unset($data['images']);

                    $Model = static::getModel();
                    $model = new $Model($data);
                    $model->save();
                    foreach ($images as $image){
                        $model->image_produits()->create([
                            'path'=> $image
                        ]);
                    }
                    return $model;
                })
                ->successNotification(Notification::make()
                    ->success()
                    ->title("Produit crée")
                )
            ,
            Actions\Action::make('importer')
                ->action(function($data){

                })
                ->form([
                    FileUpload::make('fichier')
                ])
        ];
    }
}
