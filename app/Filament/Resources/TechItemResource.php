<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechItemResource\Pages;
use App\Filament\Resources\TechItemResource\RelationManagers;
use App\Models\TechItem;
use App\Models\TechGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechItemResource extends Resource
{
    protected static ?string $model = TechItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tech_group_id')
                    ->label('Tech Group')
                    ->options(TechGroup::pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->placeholder('Pilih tech group'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('icon_url')
                    ->label('Icon URL')
                    ->maxLength(255)
                    ->default(null)
                    ->placeholder('https://example.com/icon.png'),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured')
                    ->required()
                    ->default(false),
                Forms\Components\TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->helperText('Urutan tampilan (angka kecil akan tampil lebih dulu)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('techGroup.name')
                    ->label('Tech Group')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('icon_url')
                    ->label('Icon')
                    ->width(60)
                    ->height(60),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTechItems::route('/'),
            'create' => Pages\CreateTechItem::route('/create'),
            'edit' => Pages\EditTechItem::route('/{record}/edit'),
        ];
    }
}
