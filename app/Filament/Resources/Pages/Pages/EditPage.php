<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PageResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view')
                ->icon(Heroicon::OutlinedEye)
                ->url(fn ($record) => route('pages.show', $record->slug))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }
}
