<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoutiqueResource\Pages;
use App\Filament\Resources\BoutiqueResource\RelationManagers;
use App\Models\Boutique;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Humaidem\FilamentMapPicker\Fields\OSMMap;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Intervention\Image\Point;


class BoutiqueResource extends Resource
{
    protected static ?string $model = Boutique::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = "Paramètres";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom'),
                Forms\Components\Select::make('user_id')
                    ->label("Gérant")
                    ->options(
                        User::role('GERANT_BOUTIQUE')->pluck('name','id')
                    ),
                Forms\Components\TextInput::make('contact'),
                Forms\Components\TextInput::make('email'),
                Forms\Components\FileUpload::make('image')->image()->columnSpan(2),
                Forms\Components\TextInput::make('lat')->label("Latitude"),
                Forms\Components\TextInput::make('lng')->label("Longitude")
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('Nombre de produits')->counts('propositions')
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
            'index' => Pages\ManageBoutiques::route('/'),
        ];
    }
}
