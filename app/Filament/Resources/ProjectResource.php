<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Models\ProjectCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('project_category_id')
                    ->label('Project Category')
                    ->options(ProjectCategory::pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->placeholder('Pilih kategori project'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('year')
                    ->label('Project Year')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(date('Y') + 5)
                    ->default(date('Y'))
                    ->required()
                    ->placeholder('e.g. 2024'),
                Forms\Components\Select::make('techItems')
                    ->label('Tech Stack')
                    ->multiple()
                    ->relationship('techItems', 'name')
                    ->options(\App\Models\TechItem::orderBy('name')->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->placeholder('Select technologies used in this project'),
                Forms\Components\TextInput::make('role')
                    ->label('Your Role')
                    ->maxLength(255)
                    ->default(null)
                    ->placeholder('e.g. Full Stack Developer, Frontend Developer'),
                Forms\Components\FileUpload::make('hero_image_url')
                    ->label('Hero Image')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('projects/hero-images')
                    ->visibility('public')
                    ->maxSize(5120) // 5MB
                    ->helperText('Upload gambar hero project (max 5MB)'),
                Forms\Components\Textarea::make('description_html')
                    ->label('Description')
                    ->columnSpanFull()
                    ->rows(6)
                    ->placeholder('Deskripsikan project ini secara detail...'),
                Forms\Components\TextInput::make('live_url')
                    ->label('Live URL')
                    ->maxLength(255)
                    ->default(null)
                    ->url()
                    ->placeholder('https://your-project.com'),
                Forms\Components\TextInput::make('repo_url')
                    ->label('Repository URL')
                    ->maxLength(255)
                    ->default(null)
                    ->url()
                    ->placeholder('https://github.com/username/repo'),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured Project')
                    ->required()
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Year')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->placeholder('No role specified'),
                Tables\Columns\ImageColumn::make('hero_image_url')
                    ->label('Hero Image')
                    ->width(80)
                    ->height(60),
                Tables\Columns\TextColumn::make('live_url')
                    ->label('Live Demo')
                    ->searchable()
                    ->url(fn ($record) => $record->live_url ?: null)
                    ->openUrlInNewTab()
                    ->placeholder('No live demo'),
                Tables\Columns\TextColumn::make('repo_url')
                    ->label('Repository')
                    ->searchable()
                    ->url(fn ($record) => $record->repo_url ?: null)
                    ->openUrlInNewTab()
                    ->placeholder('No repository'),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
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
            ->defaultSort('year', 'desc')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
