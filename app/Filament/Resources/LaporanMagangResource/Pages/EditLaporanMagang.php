<?php

namespace App\Filament\Resources\LaporanMagangResource\Pages;

use App\Filament\Resources\LaporanMagangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanMagang extends EditRecord
{
    protected static string $resource = LaporanMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
