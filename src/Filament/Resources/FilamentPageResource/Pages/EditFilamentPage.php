<?php

namespace Beier\FilamentPages\Filament\Resources\FilamentPageResource\Pages;

use Beier\FilamentPages\Filament\Resources\FilamentPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFilamentPage extends EditRecord
{
    protected static string $resource = FilamentPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
