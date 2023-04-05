<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BanniereResource\Pages;
use App\Filament\Resources\BanniereResource\RelationManagers;
use App\Models\Banniere;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BanniereResource extends Resource
{
    protected static ?string $model = Banniere::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = "Apparence";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(['md'=>2])
                    ->schema([
                        Forms\Components\TextInput::make('captions'),
                        Forms\Components\Select::make('place')->options([
                            'MAIN_PLACE'=>'Emplacement principal',
                            'SIDE_PLACE'=>'Sur le coté'
                        ]),
                        Forms\Components\FileUpload::make('image')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->columnSpan(2)
                            ->image()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('boutique.name')->default('Admin'),
                Tables\Columns\ToggleColumn::make('is_actif')->label("Visible"),
                Tables\Columns\BadgeColumn::make('place')
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
            'index' => Pages\ManageBannieres::route('/'),
        ];
    }
}
