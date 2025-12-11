<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Concerns\HasBlockClipboard;
use App\Filament\Resources\Events\EventResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;

class EditEvent extends EditRecord
{
    use HasBlockClipboard;

    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view')
                ->icon(Heroicon::OutlinedEye)
                ->url(fn ($record) => route('events.show', $record->slug))
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
                ->url(fn () => route('events.show', $this->record->slug))
                ->openUrlInNewTab()
                ->color('gray'),
            $this->getCancelFormAction(),
        ];
    }
}