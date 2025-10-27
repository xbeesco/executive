<div class="pbmit-slider-area pbmit-slider-four">
    <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="true" data-columns="1" data-margin="0" data-effect="fade">
        <div class="swiper-wrapper">
            @foreach(($pageSettings['slider_items'] ?? []) as $index => $slide)
            <div class="swiper-slide">
                <div class="pbmit-slider-item">
                    <div class="pbmit-slider-bg" style="background-image: url({{ image($slide['background_image'] ?? null, 'slider_item_bg') }});"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pbmit-slider-content">
                                    @if(!empty($slide['subtitle']))
                                    <h5 class="pbmit-sub-title transform-top transform-delay-1">{{ $slide['subtitle'] }}</h5>
                                    @endif
                                    @if(!empty($slide['title']))
                                    <h2 class="pbmit-title transform-bottom-1 transform-delay-2">
                                        {!! nl2br(e($slide['title'])) !!}
                                    </h2>
                                    @endif
                                    @if(!empty($slide['description']))
                                    <div class="pbmit-desc transform-bottom-1 transform-delay-3">
                                        {!! nl2br(e($slide['description'])) !!}
                                    </div>
                                    @endif
                                    @if(!empty($slide['button_text']) && !empty($slide['button_url']))
                                    <div class="pbmit-button-wrap transform-bottom-1 transform-delay-4">
                                        <a class="pbmit-btn" href="{{ $slide['button_url'] }}">
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
        </div>
    </div>
</div>
