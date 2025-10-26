<footer class="site-footer footer-style-8 pbmit-bg-color-{{ $pageSettings['footer_bg_color'] ?? 'secondary' }}">
    <!-- Newsletter Area -->
    <div class="pbmit-footer-big-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <div class="pbmit-footer-logo">
                        <img src="{{ image($settings['general']['site_logo'] ?? null, 'site_logo') }}" alt="{{ $settings['general']['site_name'] ?? config('app.name') }}">
                    </div>
                </div>
                <div class="col-md-12 col-xl-8">
                    <form action="#" method="POST">
                        @csrf
                        <div class="pbmit-newsletter">
                            <h3>Subscribe to Our Newsletter</h3>
                            <div class="pbmit-footer-email-button">
                                <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
                                <button class="pbmit-btn" type="submit">
                                    <span class="pbmit-button-content-wrapper">
                                        <span class="pbmit-button-text">Subscribe Now</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Widget Area -->
    <div class="pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
                <!-- Social Links -->
                <div class="col-md-4">
                    <aside class="widget widget_text">
                        <div class="textwidget">
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
                    </aside>
                </div>

                <!-- Menu Links -->
                <div class="col-md-4">
                    <aside class="widget pbmit-two-column-menu">
                        <h2 class="widget-title">Useful Link</h2>
                        {!! $settings['footer_menu_1'] ?? '' !!}
                    </aside>
                </div>

                <!-- Working Time -->
                <div class="col-md-4">
                    <div class="widget widget_text">
                        <h2 class="widget-title">Working Time</h2>
                        <div class="pbmit-timelist-wrapper">
                            {!! $settings['working_hours'] ?? '' !!}
                        </div>
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
                    <div class="col-md-6">
                        <div class="pbmit-footer-copyright-text-area">
                            Copyright © {{ date('Y') }} <a href="{{ url('/') }}">{{ $settings['general']['site_name'] ?? config('app.name') }}</a> All Rights Reserved.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pbmit-footer-menu-area">
                            <div class="menu-footer-menu-container">
                                <ul class="pbmit-footer-menu">
                                    {!! $settings['footer_bottom_menu'] ?? '' !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
