<?php

namespace App\Filament\Resources\TechItemResource\Pages;

use App\Filament\Resources\TechItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateTechItem extends CreateRecord
{
    protected static string $resource = TechItemResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('landing_page_data');
    }
}
