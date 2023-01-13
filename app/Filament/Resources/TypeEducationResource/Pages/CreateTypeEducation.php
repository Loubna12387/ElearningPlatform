<?php

namespace App\Filament\Resources\TypeEducationResource\Pages;

use App\Filament\Resources\TypeEducationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTypeEducation extends CreateRecord
{
    protected static string $resource = TypeEducationResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
