{{-- Slider 2 - Left-Aligned with Slide Effect --}}
<div class="pbmit-slider-area pbmit-slider-two">
    <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="1" data-margin="0" data-effect="slide">
        <div class="swiper-wrapper">
            @if(!empty($sliderData))
                @foreach($sliderData as $slide)
                <div class="swiper-slide">
                    <div class="pbmit-slider-item">
                        <div class="pbmit-slider-bg" style="background-image: url({{ $slide['image'] ?? '' }});"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="pbmit-slider-content">
                                        @if(!empty($slide['subtitle']))
                                        <h5 class="pbmit-sub-title transform-top transform-delay-1">{{ $slide['subtitle'] }}</h5>
                                        @endif

                                        @if(!empty($slide['title']))
                                        <h2 class="pbmit-title transform-left transform-delay-2">
                                            {!! nl2br($slide['title']) !!}
                                        </h2>
                                        @endif

                                        @if(!empty($slide['description']))
                                        <div class="pbmit-desc transform-center transform-delay-3">
                                            {!! nl2br($slide['description']) !!}
                                        </div>
                                        @endif

                                        @if(!empty($slide['button_text']) && !empty($slide['button_url']))
                                        <div class="pbmit-button-wrap transform-delay-4">
                                            <a class="pbmit-btn pbmit-btn-global" href="{{ $slide['button_url'] }}">
                                                <span class="pbmit-button-content-wrapper">
                                                    <span class="pbmit-button-text">{{ $slide['button_text'] }}</span>
                                                </span>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
