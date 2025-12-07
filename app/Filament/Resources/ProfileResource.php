<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('headline')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('bio')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('about_me')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('avatar_url')
                    ->image()
                    ->disk('public')
                    ->directory('profiles/avatars')
                    ->visibility('public')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '1:1',
                        '4:3',
                        '16:9',
                    ]),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('years_experience')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('projects_shipped')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('industries_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\FileUpload::make('cv_url')
                    ->acceptedFileTypes(['application/pdf'])
                    ->disk('public')
                    ->directory('profiles/cvs')
                    ->visibility('public')
                    ->maxSize(10240) // 10MB
                    ->enableDownload()
                    ->enableOpen(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('headline')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('years_experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('projects_shipped')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('industries_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cv_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
