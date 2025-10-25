<footer class="site-footer footer-style-3 pbmit-bg-color-{{ $pageSettings['footer_bg_color'] ?? 'secondary' }}">
    <!-- Footer Widget Area -->
    <div class="footer-wrap pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
                <!-- Menu Column 1 -->
                <div class="col-md-4">
                    <aside class="widget pbmit-two-column-menu">
                        {!! $settings['footer_menu_1'] ?? '' !!}
                    </aside>
                </div>

                <!-- Logo -->
                <div class="col-md-4">
                    <aside class="widget">
                        <div class="textwidget">
                            <div class="pbmit-footer-logo">
                                <img src="{{ $settings['general']['site_favicon'] ?? '/images/favicon.svg' }}" alt="{{ $settings['general']['site_name'] ?? config('app.name') }}">
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- Menu Column 2 -->
                <div class="col-md-4">
                    <aside class="widget pbmit-two-column-menu">
                        {!! $settings['footer_menu_2'] ?? '' !!}
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Big Area -->
    <div class="pbmit-footer-big-area-wrapper">
        <div class="footer-wrap pbmit-footer-big-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 pbmit-footer-left">
                        @if(!empty($settings['contact']['email']))
                        <span class="pbmit-email-text">{{ $settings['contact']['email'] }}</span>
                        @endif
                        @if(!empty($settings['contact']['phone']))
                        <span class="pbmit-phone-number">{{ $settings['contact']['phone'] }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 pbmit-footer-right">
                        @if(!empty($settings['contact']['address']))
                        <span class="pbmit-address">{!! nl2br($settings['contact']['address']) !!}</span>
                        @endif
                    </div>
                    <div class="col-md-4 pbmit-footer-right-social">
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
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Copyright -->
    <div class="pbmit-footer-text-area">
        <div class="container">
            <div class="pbmit-footer-text-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pbmit-footer-copyright-text-area">
                            Copyright © {{ date('Y') }} <a href="{{ url('/') }}">{{ $settings['general']['site_name'] ?? config('app.name') }}</a>, All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
