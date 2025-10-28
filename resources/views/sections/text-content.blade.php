<!-- Text Content Section -->
<section class="section-xl">
    <div class="container">
        <div class="row">
            <div class="col-12">
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
