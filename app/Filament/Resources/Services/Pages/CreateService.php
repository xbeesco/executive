<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Concerns\HasBlockClipboard;
use App\Filament\Resources\Services\ServiceResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;

class CreateService extends CreateRecord
{
    use HasBlockClipboard;

    protected static string $resource = ServiceResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            Action::make('pasteBlock')
                ->label('Paste Block')
                ->icon(Heroicon::ClipboardDocumentCheck)
                ->color('gray')
                ->action(fn () => $this->dispatch('request-paste-from-clipboard')),
            $this->getCreateAnotherFormAction(),
            $this->getCancelFormAction(),
        ];
    }
}