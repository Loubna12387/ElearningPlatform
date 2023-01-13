<?php

namespace App\Filament\Resources\ParagrapheResource\Pages;

use App\Filament\Resources\ParagrapheResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParagraphes extends ListRecords
{
    protected static string $resource = ParagrapheResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
