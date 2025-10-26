<header class="site-header header-style-3">
    <div class="pbmit-header-overlay">
        <!-- Pre Header -->
        <div class="pbmit-pre-header-wrapper">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="pbmit-pre-header-left">
                        <ul class="pbmit-social-links">
                            @if(!empty($settings['social_links']['facebook']))
                            <li class="pbmit-social-li pbmit-social-facebook">
                                <a title="Facebook" href="{{ $settings['social_links']['facebook'] }}" target="_blank">
                                    <span><i class="pbmit-base-icon-facebook-f"></i></span>
                                </a>
                            </li>
                            @endif
                            @if(!empty($settings['social_links']['twitter']))
                            <li class="pbmit-social-li pbmit-social-twitter">
                                <a title="Twitter" href="{{ $settings['social_links']['twitter'] }}" target="_blank">
                                    <span><i class="pbmit-base-icon-twitter-2"></i></span>
                                </a>
                            </li>
                            @endif
                            @if(!empty($settings['social_links']['linkedin']))
                            <li class="pbmit-social-li pbmit-social-linkedin">
                                <a title="LinkedIn" href="{{ $settings['social_links']['linkedin'] }}" target="_blank">
                                    <span><i class="pbmit-base-icon-linkedin-in"></i></span>
                                </a>
                            </li>
                            @endif
                            @if(!empty($settings['social_links']['instagram']))
                            <li class="pbmit-social-li pbmit-social-instagram">
                                <a title="Instagram" href="{{ $settings['social_links']['instagram'] }}" target="_blank">
                                    <span><i class="pbmit-base-icon-instagram"></i></span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="pbmit-pre-header-right">
                        <ul class="pbmit-contact-info">
                            @if(!empty($settings['general']['site_email']))
                            <li><i class="pbmit-base-icon-mail-alt"></i> {{ $settings['general']['site_email'] }}</li>
                            @endif
                            @if(!empty($settings['general']['site_address']))
                            <li><i class="pbmit-base-icon-location-dot-solid"></i>{{ $settings['general']['site_address'] }}</li>
                            @endif
                            @if(!empty($settings['general']['site_phone']))
                            <li><i class="pbmit-base-icon-phone-volume-solid-1"></i>{{ $settings['general']['site_phone'] }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="pbmit-main-header-area">
            <div class="container">
                <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                    <div class="pbmit-logo-area">
                        <div class="site-branding">
                            <h1 class="site-title">
                                <a href="{{ url('/') }}">
                                    <img class="logo-img" src="{{ $settings['general']['site_logo'] ?? '/images/logo.svg' }}" alt="{{ $settings['general']['site_name'] ?? config('app.name') }}">
                                </a>
                            </h1>
                        </div>
                    </div>
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
                    <div class="pbmit-right-box d-flex align-items-center">
                        @if(!empty($settings['general']['action_button_text']))
                        <div class="pbmit-button-box-second">
                            <a class="pbmit-btn pbmit-btn-outline" href="{{ $settings['general']['action_button_url'] ?? '#' }}">
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

    <!-- Header Area (Slider or Title Bar) -->
    @if(($pageSettings['header_area_type'] ?? 'none') === 'slider')
        @include('components.sliders.slider', ['sliderId' => $pageSettings['slider_id'] ?? null])
    @elseif(($pageSettings['header_area_type'] ?? 'none') === 'title_bar')
        @include('components.title-bar')
    @endif
</header>
