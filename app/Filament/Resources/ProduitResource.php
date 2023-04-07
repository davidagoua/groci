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
                Tables\Actions\EditAction::make(),
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
