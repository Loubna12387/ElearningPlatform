<?php

namespace App\Filament\Resources\ParagrapheResource\Pages;

use App\Filament\Resources\ParagrapheResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateParagraphe extends CreateRecord
{
    protected static string $resource = ParagrapheResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
