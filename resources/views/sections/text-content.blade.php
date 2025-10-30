@php
    $sectionSize = $block['data']['section_size'] ?? 'section-xl';
    $maxWidth = $block['data']['max_width'] ?? 'full';

    $widthClass = match($maxWidth) {
        'narrow' => 'col-lg-8 offset-lg-2',
        'medium' => 'col-lg-10 offset-lg-1',
        default => 'col-12',
    };
@endphp

<!-- Text Content Section -->
<section class="{{ $sectionSize }}">
    <div class="container">
        <div class="row">
            <div class="{{ $widthClass }}">
                <div class="text-content-wrapper">
                    <div class="fi-prose prose prose-lg max-w-none">
                        {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make($block['data']['content'] ?? '')->toHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Text Content End -->
