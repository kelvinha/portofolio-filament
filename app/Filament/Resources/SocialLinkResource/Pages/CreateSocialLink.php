<?php

namespace App\Filament\Resources\SocialLinkResource\Pages;

use App\Filament\Resources\SocialLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateSocialLink extends CreateRecord
{
    protected static string $resource = SocialLinkResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('landing_page_data');
    }
}
