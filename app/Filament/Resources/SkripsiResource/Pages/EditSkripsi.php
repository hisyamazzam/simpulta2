<?php

namespace App\Filament\Resources\SkripsiResource\Pages;

use App\Filament\Resources\SkripsiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkripsi extends EditRecord
{
    protected static string $resource = SkripsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
