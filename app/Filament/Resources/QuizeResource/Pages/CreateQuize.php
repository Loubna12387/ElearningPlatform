<?php

namespace App\Filament\Resources\QuizeResource\Pages;

use App\Filament\Resources\QuizeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuize extends CreateRecord
{
    protected static string $resource = QuizeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
