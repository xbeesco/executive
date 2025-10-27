<div class="pbmit-slider-area pbmit-slider-eight">
    <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="true"
        data-columns="1" data-margin="0" data-effect="slide">
        <div class="swiper-wrapper">
            @foreach(($pageSettings['slider_items'] ?? []) as $index => $slide)
            <!-- Slide{{ $index + 1 }} -->
            <div class="swiper-slide">
                <div class="pbmit-slider-item">
                    <div class="pbmit-slider-bg"
                        style="background-image: url({{ image($slide['background_image'] ?? null, 'slider_item_bg') }});"></div>
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="pbmit-slider-content">
                                    @if(!empty($slide['sub_title']))
                                    <h5 class="pbmit-sub-title transform-top transform-delay-1">{{ $slide['sub_title'] }}</h5>
                                    @endif
                                    <h2 class="pbmit-title transform-left transform-delay-2">
                                        {!! nl2br(e($slide['title'] ?? '')) !!}
                                    </h2>
                                    @if(!empty($slide['title_small']))
                                    <h4 class="pbmit-title-small transform-left transform-delay-3">
                                        {{ $slide['title_small'] }}
                                    </h4>
                                    @endif
                                    @if(!empty($slide['button_text']))
                                    <div class="pbmit-button-wrap transform-delay-4">
                                        <a class="pbmit-btn pbmit-btn-blackish" href="{{ $slide['button_url'] ?? '#' }}">
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
