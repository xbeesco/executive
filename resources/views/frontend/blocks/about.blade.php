<!-- About Block -->
<section class="block block-about section-xl">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-6">
                <div class="about-one-leftbox">
                    @if(!empty($block['image']))
                    <div class="about-image">
                        <img src="{{ $block['image'] }}" alt="{{ $block['title'] ?? '' }}" class="img-fluid">
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="about-one-rightbox">
                    <div class="pbmit-heading-subheading animation-style2">
                        @if(!empty($block['subtitle']))
                        <h4 class="pbmit-subtitle">{{ $block['subtitle'] }}</h4>
                        @endif
                        @if(!empty($block['title']))
                        <h2 class="pbmit-title">{{ $block['title'] }}</h2>
                        @endif
                        @if(!empty($block['content']))
                        <div class="pbmit-heading-desc">
                            {!! $block['content'] !!}
                        </div>
                        @endif
                    </div>
                    @if(!empty($block['features']))
                    <div class="row g-3">
                        @foreach($block['features'] as $feature)
                        <div class="col-md-6">
                            <article class="pbmit-miconheading-style-9">
                                <div class="pbmit-ihbox-style-9">
                                    <div class="pbmit-ihbox-box d-flex align-items-center">
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper">
                                                <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                    <i class="pbmit-xinterio-icon {{ $feature['icon'] ?? '' }}"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pbmit-ihbox-contents">
                                            <h2 class="pbmit-element-title">{{ $feature['text'] ?? '' }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Block End -->
