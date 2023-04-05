<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarqueResource\Pages;
use App\Filament\Resources\MarqueResource\RelationManagers;
use App\Models\Marque;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarqueResource extends Resource
{
    protected static ?string $model = Marque::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-alt';
    protected static ?string $navigationGroup = "Paramètres";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')->label("Nom de la marque")

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('produit_count')->counts('produits')
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
            'index' => Pages\ManageMarques::route('/'),
        ];
    }
}
