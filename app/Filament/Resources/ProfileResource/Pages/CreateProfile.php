<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('landing_page_data');
    }
}
