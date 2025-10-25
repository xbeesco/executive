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
                                    <img class="logo-img" src="{{ $settings['general']['site_logo_white'] ?? $settings['general']['site_logo'] ?? '/images/logo-white.svg' }}" alt="{{ $settings['general']['site_name'] ?? config('app.name') }}">
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
                                            {!! $settings['menu'] ?? '' !!}
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="pbmit-right-box d-flex align-items-center">
                        @if(!empty($settings['contact']['phone']))
                        <div class="pbmit-header-button">
                            <a href="tel:{{ str_replace(' ', '', $settings['contact']['phone']) }}">
                                <span class="pbmit-header-button-text-1">{{ $settings['contact']['phone'] }}</span>
                                <span class="pbmit-header-button-text-2">tel:{{ str_replace(' ', '', $settings['contact']['phone']) }}</span>
                            </a>
                        </div>
                        @endif
                        @if(!empty($settings['header_button']))
                        <div class="pbmit-button-box-second">
                            <a class="pbmit-btn pbmit-header-button" href="{{ $settings['header_button']['url'] ?? '#' }}">
                                <span class="pbmit-button-content-wrapper">
                                    <span class="pbmit-button-text">{{ $settings['header_button']['text'] ?? 'Book Consult' }}</span>
                                </span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area (Slider or Title Bar) -->
    @if(($pageSettings['header_area_type'] ?? 'none') === 'slider')
        @include('components.sliders.slider', ['sliderId' => $pageSettings['slider_id'] ?? null])
    @elseif(($pageSettings['header_area_type'] ?? 'none') === 'title_bar')
        @include('components.title-bar')
    @endif
</header>
