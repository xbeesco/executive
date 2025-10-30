<section class="pbmit-sticky-section">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-5">
                <div class="pbmit-sticky-col">
                    <div class="ihbox-six-left-area">
                        <div class="pbmit-heading-subheading animation-style4">
                            @if(!empty($block['data']['subtitle']))
                            <h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
                            @endif
                            <h2 class="pbmit-title">{{ $block['data']['title'] ?? '' }}</h2>
                            @if(!empty($block['data']['content']))
                            <div class="pbmit-heading-desc">{!! $block['data']['content'] !!}</div>
                            @endif
                        </div>
                        @if(!empty($block['data']['image']))
                        <div class="text-center">
                            <img src="{{ Storage::url($block['data']['image']) }}" alt="{{ $block['data']['title'] ?? '' }}">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-7">
                <div class="ihbox-six-right-area">
                    <div class="row">
                        @foreach($block['data']['features'] ?? [] as $feature)
                        <article class="pbmit-miconheading-style-19 col-md-6">
                            <div class="pbmit-ihbox-style-19">
                                <div class="pbmit-ihbox-box">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-xinterio-icon {{ $feature['icon'] ?? 'pbmit-xinterio-icon-living-room' }}"></i>
                                        </div>
                                    </div>
                                    <h2 class="pbmit-element-title">
                                        {{ $feature['title'] ?? '' }}
                                    </h2>
                                    @if(!empty($feature['description']))
                                    <div class="pbmit-heading-desc">{{ $feature['description'] }}</div>
                                    @endif
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
