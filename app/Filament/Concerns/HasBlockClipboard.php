<?php

namespace App\Filament\Concerns;

use App\Services\Schemas\ContentBuilderSchema;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

trait HasBlockClipboard
{
    /**
     * Handle paste block from JavaScript clipboard
     */
    #[On('paste-block-from-clipboard')]
    public function pasteBlockFromClipboard(string $blockJson): void
    {
        try {
            $blockData = json_decode($blockJson, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->notifyClipboardError('Invalid Data', 'The clipboard does not contain valid block data.');
                return;
            }

            if (!$this->isValidBlockStructure($blockData)) {
                $this->notifyClipboardError('Invalid Block', 'The clipboard data is not a valid block structure.');
                return;
            }

            if (!$this->isValidBlockType($blockData['type'])) {
                $this->notifyClipboardError('Unknown Block Type', "Block type '{$blockData['type']}' is not recognized.");
                return;
            }

            $this->addBlockToContent($blockData);

            Notification::make()
                ->success()
                ->title('Block Pasted!')
                ->send();

        } catch (\Exception $e) {
            $this->notifyClipboardError('Error', 'Failed to paste block: ' . $e->getMessage());
        }
    }

    protected function isValidBlockStructure(array $data): bool
    {
        return isset($data['type']) && isset($data['data']);
    }

    protected function isValidBlockType(string $type): bool
    {
        $validTypes = array_map(
            fn ($block) => $block->getName(),
            ContentBuilderSchema::getBlocks()
        );

        return in_array($type, $validTypes);
    }

    protected function addBlockToContent(array $blockData): void
    {
        // Get current content
        $content = $this->data['content'] ?? [];
        
        // Generate new UUID for the block
        $newUuid = (string) Str::uuid();
        
        // Add the new block
        $content[$newUuid] = $blockData;
        
        // Update data
        $this->data['content'] = $content;
        
        // Re-fill the form to reflect changes in the UI
        $this->form->fill($this->data);
    }

    protected function notifyClipboardError(string $title, string $body): void
    {
        Notification::make()
            ->danger()
            ->title($title)
            ->body($body)
            ->send();
    }
}
