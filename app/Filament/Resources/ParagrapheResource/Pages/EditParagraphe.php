<?php

namespace App\Filament\Resources\ParagrapheResource\Pages;

use App\Filament\Resources\ParagrapheResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParagraphe extends EditRecord
{
    protected static string $resource = ParagrapheResource::class;

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
