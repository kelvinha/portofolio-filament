<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialLinkResource\Pages;
use App\Filament\Resources\SocialLinkResource\RelationManagers;
use App\Models\SocialLink;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Profile;

class SocialLinkResource extends Resource
{
    protected static ?string $model = SocialLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('profile_id')
                    ->required()
                    ->numeric()
                    ->hidden(),
                Forms\Components\Select::make('platform')
                    ->required()
                    ->options([
                        'GitHub' => 'GitHub',
                        'Twitter' => 'Twitter/X',
                        'LinkedIn' => 'LinkedIn',
                        'Instagram' => 'Instagram',
                        'Facebook' => 'Facebook',
                        'YouTube' => 'YouTube',
                        'Dribbble' => 'Dribbble',
                        'Behance' => 'Behance',
                        'Medium' => 'Medium',
                        'Dev.to' => 'Dev.to',
                    ])
                    ->placeholder('Pilih platform social media')
                    ->helperText('SVG icon akan di-generate otomatis berdasarkan platform yang dipilih'),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255)
                    ->url()
                    ->placeholder('https://...'),
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
                Tables\Columns\TextColumn::make('platform')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\ViewColumn::make('icon_preview')
                    ->label('Icon')
                    ->view('filament.tables.columns.social-icon-preview')
                    ->width('60px'),
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

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        $activeProfile = Profile::latest('updated_at')->first();
        $data['profile_id'] = $activeProfile?->id ?? 1;

        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialLinks::route('/'),
            'create' => Pages\CreateSocialLink::route('/create'),
            'edit' => Pages\EditSocialLink::route('/{record}/edit'),
        ];
    }
}
