<?php

namespace App\Filament\Resources\QuizeResource\Pages;

use App\Filament\Resources\QuizeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuize extends EditRecord
{
    protected static string $resource = QuizeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
