<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkExperienceResource\Pages;
use App\Models\WorkExperience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class WorkExperienceResource extends Resource
{
    protected static ?string $model = WorkExperience::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('company_logo')
                    ->label('Company Logo')
                    ->image()
                    ->directory('work-experiences/logos')
                    ->visibility('public')
                    ->maxSize(2048) // 2MB
                    ->helperText('Upload company logo (max 2MB)')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
                Forms\Components\Textarea::make('description')
                    ->label('Company Description')
                    ->rows(3)
                    ->placeholder('Describe what the company does...'),
                Forms\Components\TextInput::make('roles')
                    ->label('Your Role/Position')
                    ->maxLength(255)
                    ->placeholder('e.g. Full Stack Developer, Software Engineer'),
                Forms\Components\TextInput::make('work_start_year')
                    ->label('Start Year')
                    ->numeric()
                    ->minValue(1950)
                    ->maxValue(date('Y'))
                    ->required()
                    ->placeholder('e.g. 2020'),
                Forms\Components\TextInput::make('work_end_year')
                    ->label('End Year (leave empty if current)')
                    ->numeric()
                    ->minValue(1950)
                    ->maxValue(date('Y') + 5)
                    ->nullable()
                    ->placeholder('e.g. 2024 or leave empty'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('company_logo')
                    ->label('Logo')
                    ->width(50)
                    ->height(50)
                    ->getStateUsing(function ($record) {
                        return $record->company_logo ? Storage::disk('public')->url($record->company_logo) : null;
                    }),
                Tables\Columns\TextColumn::make('roles')
                    ->label('Role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_start_year')
                    ->label('Start')
                    ->sortable(),
                Tables\Columns\TextColumn::make('work_end_year')
                    ->label('End')
                    ->sortable()
                    ->placeholder('Present'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
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
            'index' => Pages\ListWorkExperiences::route('/'),
            'create' => Pages\CreateWorkExperience::route('/create'),
            'edit' => Pages\EditWorkExperience::route('/{record}/edit'),
        ];
    }
}
