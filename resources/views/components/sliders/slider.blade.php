{{-- Slider Component --}}
@php
    $sliderClass = 'pbmit-slider-' . match($pageSettings['header_style'] ?? 3) {
        3 => 'three',
        4 => 'four',
        8 => 'eight',
        default => 'one'
    };
@endphp

<div class="pbmit-slider-area {{ $sliderClass }}">
    <div class="swiper-slider"
         data-autoplay="true"
         data-loop="true"
         data-dots="true"
         data-arrows="{{ $pageSettings['header_style'] == 8 ? 'true' : 'false' }}"
         data-columns="1"
         data-margin="0"
         data-effect="{{ $pageSettings['header_style'] == 4 ? 'fade' : 'slide' }}">
        <div class="swiper-wrapper">
            @if(!empty($sliderData))
                @foreach($sliderData as $slide)
                <div class="swiper-slide">
                    <div class="pbmit-slider-item">
                        <div class="pbmit-slider-bg" style="background-image: url({{ $slide['image'] ?? '' }});"></div>
                        <div class="container">
                            <div class="row {{ $pageSettings['header_style'] == 8 ? 'text-center' : '' }} {{ in_array($pageSettings['header_style'], [3, 4]) ? 'align-items-center' : '' }}">
                                <div class="col-md-{{ in_array($pageSettings['header_style'], [3, 4]) ? '12 col-lg-' . ($pageSettings['header_style'] == 3 ? '5' : '6') : '12' }} {{ $pageSettings['header_style'] == 3 ? 'pbmit-right-col' : '' }}">
                                    <div class="pbmit-slider-content">
                                        @if(!empty($slide['subtitle']))
                                        <h5 class="pbmit-sub-title transform-top transform-delay-1">{{ $slide['subtitle'] }}</h5>
                                        @endif

                                        @if(!empty($slide['title']))
                                        <h2 class="pbmit-title {{ in_array($pageSettings['header_style'], [3, 4]) ? 'transform-left' : 'transform-bottom-1' }} transform-delay-2">
                                            {!! nl2br($slide['title']) !!}
                                        </h2>
                                        @endif

                                        @if($pageSettings['header_style'] == 8 && !empty($slide['title_small']))
                                        <h4 class="pbmit-title-small transform-left transform-delay-3">
                                            {{ $slide['title_small'] }}
                                        </h4>
                                        @endif

                                        @if(!empty($slide['description']))
                                        <div class="pbmit-desc {{ in_array($pageSettings['header_style'], [3, 4]) ? 'transform-left' : 'transform-bottom-1' }} transform-delay-{{ in_array($pageSettings['header_style'], [3, 4]) ? '4' : '3' }}">
                                            {!! nl2br($slide['description']) !!}
                                        </div>
                                        @endif

                                        @if(!empty($slide['button_text']) && !empty($slide['button_url']))
                                        <div class="pbmit-button-wrap {{ in_array($pageSettings['header_style'], [3, 4]) ? 'transform-left' : 'transform-bottom-1' }} transform-delay-{{ $pageSettings['header_style'] == 8 ? '4' : (in_array($pageSettings['header_style'], [3, 4]) ? '5' : '3') }}">
                                            <a class="pbmit-btn {{ $pageSettings['header_style'] == 1 ? 'pbmit-btn-outline' : ($pageSettings['header_style'] == 8 ? 'pbmit-btn-blackish' : 'pbmit-btn-global') }}" href="{{ $slide['button_url'] }}">
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

    @if($pageSettings['header_style'] != 8)
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
    @endif
</div>
