<section class="block block-image">
    <div class="image-wrapper">
        <img src="{{ $block['image'] ?? '' }}" alt="{{ $block['caption'] ?? '' }}" class="block-image">
        @if($block['caption'] ?? null)
            <figcaption>{{ $block['caption'] }}</figcaption>
        @endif
    </div>
</section>
