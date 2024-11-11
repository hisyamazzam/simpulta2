<?php

namespace App\Filament\Resources\DisertasiResource\Pages;

use App\Filament\Resources\DisertasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDisertasis extends ListRecords
{
    protected static string $resource = DisertasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
