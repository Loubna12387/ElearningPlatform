<?php

namespace App\Filament\Resources\TypeEducationResource\Pages;

use App\Filament\Resources\TypeEducationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeEducation extends EditRecord
{
    protected static string $resource = TypeEducationResource::class;

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
