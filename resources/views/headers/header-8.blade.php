<header class="site-header header-style-8">
    <div class="pbmit-header-overlay">
        <!-- Main Header -->
        <div class="pbmit-main-header-area">
            <div class="container-fluid">
                <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                    <div class="pbmit-logo-area">
                        <div class="site-branding">
                            <h1 class="site-title">
                                <a href="{{ url('/') }}">
                                    <img class="logo-img" src="{{ image($settings['general']['site_logo_white'] ?? $settings['general']['site_logo'] ?? null, 'site_logo_white') }}" alt="{{ $settings['general']['site_name'] ?? config('app.name') }}">
                                </a>
                            </h1>
                        </div>
                    </div>
                    <div class="pbmit-menuarea">
                        <div class="site-navigation">
                            <nav class="main-menu navbar-expand-xl navbar-light">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button">
                                        <i class="pbmit-base-icon-menu-1"></i>
                                    </button>
                                </div>
                                <div class="pbmit-mobile-menu-bg"></div>
                                <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                    <div class="pbmit-menu-wrap">
                                        <span class="closepanel">
                                            <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
                                                <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                                                <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
                                            </svg>
                                        </span>
                                        <ul class="navigation clearfix">
                                            @foreach(($settings['menu'] ?? []) as $item)
                                                <li class="menu-item @if(!empty($item['children'])) menu-item-has-children @endif">
                                                    <a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] ?? '' }}</a>
                                                    @if(!empty($item['children']))
                                                        <ul class="sub-menu">
                                                            @foreach($item['children'] as $child)
                                                                <li class="menu-item">
                                                                    <a href="{{ $child['url'] ?? '#' }}">{{ $child['label'] ?? '' }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="pbmit-right-box d-flex align-items-center">
                        @if(!empty($settings['general']['site_phone']))
                        <div class="pbmit-header-button">
                            <a href="tel:{{ str_replace(' ', '', $settings['general']['site_phone']) }}">
                                <span class="pbmit-header-button-text-1">{{ $settings['general']['site_phone'] }}</span>
                                <span class="pbmit-header-button-text-2">tel:{{ str_replace(' ', '', $settings['general']['site_phone']) }}</span>
                            </a>
                        </div>
                        @endif
                        @if(!empty($settings['general']['action_button_text']))
                        <div class="pbmit-button-box-second">
                            <a class="pbmit-btn pbmit-header-button" href="{{ $settings['general']['action_button_url'] ?? '#' }}">
                                <span class="pbmit-button-content-wrapper">
                                    <span class="pbmit-button-text">{{ $settings['general']['action_button_text'] }}</span>
                                </span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-slider-area pbmit-slider-eight">
        <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="true" data-columns="1" data-margin="0" data-effect="slide">
            <div class="swiper-wrapper">
                @foreach(($pageSettings['slider_items'] ?? []) as $index => $slide)
                <!-- Slide{{ $index + 1 }} -->
                <div class="swiper-slide">
                    <div class="pbmit-slider-item">
                        <div class="pbmit-slider-bg" style="background-image: url({{ image($slide['background_image'] ?? null, 'slider_item_bg') }});"></div>
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
</header>
