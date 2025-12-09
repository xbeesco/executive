<!-- Content Gallery Block (No Section Wrapper) -->
<div class="content-gallery-block mb-4">
    @if(!empty($block['data']['images']) && is_array($block['data']['images']))
        <div class="row g-3">
            @foreach($block['data']['images'] as $image)
                <div class="col-md-{{ $block['data']['columns'] ?? '4' }}">
                    <div class="gallery-item">
                        <img
                            src="{{ image($image['image'] ?? '') }}"
                            alt="{{ $image['alt_text'] ?? '' }}"
                            class="img-fluid rounded"
                        >
                        @if(!empty($image['caption']))
                            <p class="small text-muted mt-2">{{ $image['caption'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<!-- Content Gallery End -->
