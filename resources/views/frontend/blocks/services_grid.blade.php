<!-- Services Grid Block -->
<section class="block block-services pbmit-extend-animation service-one pbmit-bg-color-secondary">
    <div class="container">
        <div class="text-center position-relative">
            <div class="pbmit-heading-subheading text-center animation-style2">
                @if(!empty($block['subtitle']))
                <h4 class="pbmit-subtitle">{{ $block['subtitle'] }}</h4>
                @endif
                @if(!empty($block['title']))
                <h2 class="pbmit-title">{{ $block['title'] }}</h2>
                @endif
            </div>
            <div class="pbmit-service-highlight">
                <h2>Services</h2>
            </div>
        </div>
        @if(!empty($block['services']))
        <div class="row g-3 mt-4">
            @foreach($block['services'] as $service)
            <div class="col-md-{{ 12 / ($block['columns'] ?? 3) }}">
                <article class="pbmit-ele-service pbmit-service-style-2">
                    <div class="pbminfotech-post-item">
                        <div class="pbminfotech-box-content">
                            <div class="pbmit-service-icon elementor-icon">
                                <i class="pbmit-xinterio-icon {{ $service['icon'] ?? '' }}"></i>
                            </div>
                            <div class="pbmit-content-box">
                                <h3 class="pbmit-service-title">
                                    {{ $service['title'] ?? '' }}
                                </h3>
                                <div class="pbmit-service-description">
                                    <p>{{ $service['description'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
<!-- Services Grid Block End -->
