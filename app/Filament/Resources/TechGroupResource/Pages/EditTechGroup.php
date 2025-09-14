<?php

namespace App\Filament\Resources\TechGroupResource\Pages;

use App\Filament\Resources\TechGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechGroup extends EditRecord
{
    protected static string $resource = TechGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
