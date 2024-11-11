<?php

namespace App\Filament\Resources\LaporanMagangResource\Pages;

use App\Filament\Resources\LaporanMagangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanMagangs extends ListRecords
{
    protected static string $resource = LaporanMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
