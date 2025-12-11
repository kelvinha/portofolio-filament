<?php

namespace App\Filament\Resources\TechGroupResource\Pages;

use App\Filament\Resources\TechGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditTechGroup extends EditRecord
{
    protected static string $resource = TechGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('landing_page_data');
    }
}
