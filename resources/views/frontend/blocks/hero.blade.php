<section class="block block-hero">
    <div class="hero-content" @if($block['image'] ?? null)style="background-image: url('{{ $block['image'] }}')"@endif>
        <div class="hero-overlay">
            <h1>{{ $block['title'] ?? '' }}</h1>
            @if($block['subtitle'] ?? null)
                <p class="subtitle">{{ $block['subtitle'] }}</p>
            @endif
            @if($block['buttons'] ?? null)
                <div class="hero-buttons">
                    @foreach($block['buttons'] as $button)
                        <a href="{{ $button['url'] ?? '#' }}" class="btn btn-{{ $button['style'] ?? 'primary' }}">
                            {{ $button['label'] ?? 'Button' }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
