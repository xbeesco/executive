<!-- Content Text Block (No Section Wrapper) -->
<div class="content-text-block mb-4">
    <div class="fi-prose prose prose-lg max-w-none">
        {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make($block['data']['content'] ?? '')->toHtml() !!}
    </div>
</div>
<!-- Content Text End -->
