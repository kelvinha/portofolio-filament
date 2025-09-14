<?php

namespace App\Filament\Resources\TechGroupResource\Pages;

use App\Filament\Resources\TechGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechGroups extends ListRecords
{
    protected static string $resource = TechGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
