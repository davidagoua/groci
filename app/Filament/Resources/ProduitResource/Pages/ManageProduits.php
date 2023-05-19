<?php

namespace App\Filament\Resources\ProduitResource\Pages;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\ProduitResource;
use App\Models\Categorie;
use App\Models\Produit;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ManageProduits extends ManageRecords
{
    protected static string $resource = ProduitResource::class;
    protected static ?int $navigationSort = 1;

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

    public function getTableBulkActions(): array
    {
        return [
            FilamentExportBulkAction::make('exporter')
                ->disableAdditionalColumns(true)
        ];
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
                    SimpleExcelReader::create(storage_path('app/public/'. $data['fichier']))->getRows()->each(function(array $row){
                        $Model = static::getModel();
                        $produit = new $Model;
                        $produit->categorie_id = Categorie::query()->firstWhere('name', 'like', $row['CATEGORIE'])->id ?? 0;
                        $produit->nom = $row['NOM'];
                        $produit->unite = $row['UNITE'];
                        $produit->save();
                    });

                    Filament::notify('success', "Produits Enregistrés");
                })
                ->form([
                    FileUpload::make('fichier')->required()
                ]),

            Actions\Action::make("Exporter")
                ->action(function(){
                    $writer = SimpleExcelWriter::streamDownload("Produits.xlsx");
                    $writer->addHeader(['n°','nom','unite','prix']);
                    $rows = $this->getTableQuery()->select(['id','nom','unite'])->get();
                    $rows->each(fn($row)=> $writer->addRow($row));
                    $writer->toBrowser();
                    Filament::notify('success',"Fichier téléchargé");
                })
        ];
    }
}
