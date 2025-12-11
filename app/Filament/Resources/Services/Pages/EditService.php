<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Concerns\HasBlockClipboard;
use App\Filament\Resources\Services\ServiceResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;

class EditService extends EditRecord
{
    use HasBlockClipboard;

    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view')
                ->icon(Heroicon::OutlinedEye)
                ->url(fn ($record) => route('services.show', $record->slug))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
            Action::make('pasteBlock')
                ->label('Paste Block')
                ->icon(Heroicon::ClipboardDocumentCheck)
                ->color('gray')
                ->action(fn () => $this->dispatch('request-paste-from-clipboard')),
            Action::make('view')
                ->label('View')
                ->icon(Heroicon::OutlinedEye)
                ->url(fn () => route('services.show', $this->record->slug))
                ->openUrlInNewTab()
                ->color('gray'),
            $this->getCancelFormAction(),
        ];
    }
}