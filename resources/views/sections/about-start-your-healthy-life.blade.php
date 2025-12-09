<section class="about-section-three">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="about-three-left-area">
                    <div class="pbmit-heading-subheading animation-style2">
                        @if(!empty($block['data']['subtitle']))
                        <h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
                        @endif
                        @if(!empty($block['data']['title']))
                        <h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
                        @endif
                        @if(!empty($block['data']['content']))
                        <div class="pbmit-heading-desc">
                            {!! $block['data']['content'] !!}
                        </div>
                        @endif
                    </div>
                    @if(!empty($block['data']['features']) && is_array($block['data']['features']))
                    <div class="row">
                        @foreach($block['data']['features'] as $index => $feature)
                        <article class="pbmit-miconheading-style-1 col-md-12">
                            <div class="pbmit-ihbox-style-1">
                                <div class="pbmit-ihbox-headingicon d-flex align-items-center">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-text">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}.</div>
                                    </div>
                                    <div class="pbmit-ihbox-contents">
                                        <h2 class="pbmit-element-title">
                                            {{ $feature['text'] }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    @endif
                    <a class="pbmit-btn pbmit-btn-outline mt-3" href="about-us.html">
                        <span class="pbmit-button-content-wrapper">
                            <span class="pbmit-button-text">More About</span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-12 col-xl-6 position-relative">
                <div class="about-three-rightbox">
                    @if(!empty($block['data']['year']))
                    <div class="fid-style-area">
                        <div class="pbminfotech-ele-fid-style-4">
                            <div class="pbmit-fld-contents">
                                <div class="pbmit-fld-wrap">
                                    <div class="pbmit-fid-icon-title">
                                        <span class="pbmit-fid-title">Started In</span>
                                    </div>
                                    <h4 class="pbmit-fid-inner">
                                        <span class="pbmit-fid-before"></span>
                                        <span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $block['data']['year'] }}" data-interval="10">{{ $block['data']['year'] }}</span>
                                        <span class="pbmit-fid"></span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(!empty($block['data']['image']))
                    <div class="about-three-img1">
                        <div class="pbmit-animation-style7">
                            <img src="{{ image($block['data']['image']) }}" class="img-fluid" alt="{{ $block['data']['title'] }}">
                        </div>
                    </div>
                    @endif
                    @if(!empty($block['data']['image_2']))
                    <div class="about-three-img2">
                        <div class="pbmit-animation-style7">
                            <img src="{{ image($block['data']['image_2']) }}" class="img-fluid" alt="{{ $block['data']['title'] }}">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
