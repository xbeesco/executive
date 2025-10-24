
<x-filament-widgets::widget class="fi-wo-stats-overview-widget">
    <x-slot name="heading">
        {{ $this->getTitle() }}
    </x-slot>

    <form wire:submit="save" class="space-y-6">
        {{ $this->form }}

        <div class="flex justify-end gap-3">
            <x-filament::button
                type="submit"
                icon="heroicon-o-check"
            >
                {{ __('filament-panels::resources/pages/edit-record.form.actions.save.label') }}
            </x-filament::button>
        </div>
    </form>
</x-filament-widgets::widget>
