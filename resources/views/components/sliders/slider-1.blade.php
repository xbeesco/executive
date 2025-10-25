{{-- Slider 1 - Centered Text with Fade Effect --}}
<div class="pbmit-slider-area pbmit-slider-one">
    <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="1" data-margin="0" data-effect="fade">
        <div class="swiper-wrapper">
            @if(!empty($sliderData))
                @foreach($sliderData as $slide)
                <div class="swiper-slide">
                    <div class="pbmit-slider-item">
                        <div class="pbmit-slider-bg" style="background-image: url({{ $slide['image'] ?? '' }});"></div>
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <div class="pbmit-slider-content">
                                        @if(!empty($slide['subtitle']))
                                        <h5 class="pbmit-sub-title transform-top transform-delay-1">{{ $slide['subtitle'] }}</h5>
                                        @endif

                                        @if(!empty($slide['title']))
                                        <h2 class="pbmit-title transform-bottom-1 transform-delay-2">
                                            {!! nl2br($slide['title']) !!}
                                        </h2>
                                        @endif

                                        @if(!empty($slide['button_text']) && !empty($slide['button_url']))
                                        <div class="pbmit-button-wrap transform-bottom-1 transform-delay-3">
                                            <a class="pbmit-btn pbmit-btn-outline" href="{{ $slide['button_url'] }}">
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
        <div class="pbmit-slider-dots-corner">
            <div class="pbmit-sticky-corner pbmit-top-right-corner">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 20V0C20 16 16 20 0 20H20Z" fill="red"></path>
                </svg>
            </div>
            <div class="pbmit-sticky-corner pbmit-bottom-left-corner">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 20V0C20 16 16 20 0 20H20Z" fill="red"></path>
                </svg>
            </div>
        </div>
    </div>
</div>
