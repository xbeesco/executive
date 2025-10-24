<x-filament-panels::page>
    <form wire:submit.prevent="saveSettings">
        {{ $this->form }}

        <div class="mt-8 flex gap-4" style="margin-top: 20px;">
            @foreach($this->getFormActions() as $action)
                {{ $action }}
            @endforeach
        </div>
    </form>

    <x-filament-actions::modals />
</x-filament-panels::page>
