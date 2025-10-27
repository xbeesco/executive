<div class="pbmit-slider-area pbmit-slider-three">
    <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false"
        data-columns="1" data-margin="0" data-effect="fade">
        <div class="swiper-wrapper">
            @foreach(($pageSettings['slider_items'] ?? []) as $index => $slide)
            <!-- Slide{{ $index + 1 }} -->
            <div class="swiper-slide">
                <div class="pbmit-slider-item">
                    <div class="pbmit-slider-bg"
                        style="background-image: url({{ image($slide['background_image'] ?? null, 'slider_item_bg') }});"></div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7"></div>
                            <div class="col-md-12 col-lg-5 pbmit-right-col">
                                <div class="pbmit-slider-content">
                                    <h2 class="pbmit-title transform-left transform-delay-3">{!! nl2br(e($slide['title'] ?? '')) !!}</h2>
                                    @if(!empty($slide['description']))
                                    <p class="pbmit-desc transform-left transform-delay-4">{!! nl2br(e($slide['description'])) !!}</p>
                                    @endif
                                    @if(!empty($slide['button_text']))
                                    <div class="pbmit-button-wrap transform-left transform-delay-5">
                                        <a class="pbmit-btn pbmit-btn-global" href="{{ $slide['button_url'] ?? '#' }}">
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
