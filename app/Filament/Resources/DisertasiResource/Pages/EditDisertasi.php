<?php

namespace App\Filament\Resources\DisertasiResource\Pages;

use App\Filament\Resources\DisertasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDisertasi extends EditRecord
{
    protected static string $resource = DisertasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
