<?php

namespace App\Filament\Resources\SkripsiResource\Pages;

use App\Filament\Resources\SkripsiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkripsis extends ListRecords
{
    protected static string $resource = SkripsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
