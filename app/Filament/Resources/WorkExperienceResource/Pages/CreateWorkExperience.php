<?php

namespace App\Filament\Resources\WorkExperienceResource\Pages;

use App\Filament\Resources\WorkExperienceResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateWorkExperience extends CreateRecord
{
    protected static string $resource = WorkExperienceResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('landing_page_data');
    }
}
