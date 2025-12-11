<?php

namespace App\Filament\Resources\TechGroupResource\Pages;

use App\Filament\Resources\TechGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateTechGroup extends CreateRecord
{
    protected static string $resource = TechGroupResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('landing_page_data');
    }
}
