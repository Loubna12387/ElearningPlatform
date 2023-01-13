<?php

namespace App\Filament\Resources\TypeEducationResource\Pages;

use App\Filament\Resources\TypeEducationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeEducation extends ListRecords
{
    protected static string $resource = TypeEducationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
