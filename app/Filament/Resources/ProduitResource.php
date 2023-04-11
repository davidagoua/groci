<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduitResource\Pages;
use App\Filament\Resources\ProduitResource\RelationManagers;
use App\Models\Categorie;
use App\Models\Produit;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProduitResource extends Resource
{
    protected static ?string $model = Produit::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';
    protected static ?string $navigationGroup = "Produits";
    protected static ?int $navigationSort = 30;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('nom')->label("Nom"),
                    Forms\Components\Select::make('categorie_id')
                        ->label("Categorie")
                        ->options(Categorie::all()->pluck('name','id')),
                    Forms\Components\TextInput::make('unite')->placeholder('400kg'),
                    Forms\Components\FileUpload::make('images')->multiple()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')->searchable(isIndividual: true),
                Tables\Columns\ImageColumn::make('image')
                    ->getStateUsing(fn($record)=> $record->image()->path)
                    ->label("Image"),
                Tables\Columns\TextColumn::make('categorie.name'),
                Tables\Columns\ToggleColumn::make('is_actif')->label("Actif"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->using(function($record, $data){
                    $images = $data['images'];
                    unset($data['images']);
                    foreach ($images as $image){
                        $record->image_produits()->create([
                            'path'=> $image
                        ]);
                    }
                    $record->update($data);
                    return $record;
                }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProduits::route('/'),
        ];
    }
}
