<?php

namespace App\Filament\Resources\ProjectCategoryResource\Pages;

use App\Filament\Resources\ProjectCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateProjectCategory extends CreateRecord
{
    protected static string $resource = ProjectCategoryResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('landing_page_data');
    }
}
