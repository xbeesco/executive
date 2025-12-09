<!-- Content Image Block (No Section Wrapper) -->
<div class="content-image-block mb-4">
    @if(!empty($block['data']['image']))
        <figure class="image-figure {{ $block['data']['alignment'] ?? 'text-center' }}">
            <img
                src="{{ image($block['data']['image']) }}"
                alt="{{ $block['data']['alt_text'] ?? '' }}"
                class="img-fluid rounded {{ $block['data']['size'] ?? 'w-100' }}"
            >
            @if(!empty($block['data']['caption']))
                <figcaption class="figure-caption mt-2">
                    {{ $block['data']['caption'] }}
                </figcaption>
            @endif
        </figure>
    @endif
</div>
<!-- Content Image End -->
