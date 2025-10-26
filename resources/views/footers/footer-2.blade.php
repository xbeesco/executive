<footer class="site-footer footer-style-2 pbmit-bg-color-{{ $pageSettings['footer_bg_color'] ?? 'light' }}">
    <!-- Footer Widget Area -->
    <div class="footer-wrap pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
                <!-- Logo & Contact -->
                <div class="col-md-6 col-xl-4">
                    <aside class="widget widget_text">
                        <div class="textwidget">
                            <div class="pbmit-footer-logo">
                                <img src="{{ image($settings['general']['site_logo'] ?? null, 'site_logo') }}" alt="{{ $settings['general']['site_name'] ?? config('app.name') }}">
                            </div>
                        </div>
                    </aside>
                    <aside class="widget">
                        <div class="pbmit-contact-widget-lines">
                            @if(!empty($settings['contact']['address']))
                            <div class="pbmit-contact-widget-line pbmit-contact-widget-address">{{ $settings['contact']['address'] }}</div>
                            @endif
                            @if(!empty($settings['contact']['phone']))
                            <div class="pbmit-contact-widget-line pbmit-contact-widget-phone">{{ $settings['contact']['phone'] }}</div>
                            @endif
                            @if(!empty($settings['contact']['email']))
                            <div class="pbmit-contact-widget-line pbmit-contact-widget-email">{{ $settings['contact']['email'] }}</div>
                            @endif
                        </div>
                    </aside>
                </div>

                <!-- Menu Column 1 -->
                <div class="col-md-6 col-xl-4">
                    <aside class="pbmit-two-column-menu widget">
                        {!! $settings['footer_menu_1'] ?? '' !!}
                    </aside>
                </div>

                <!-- Menu Column 2 -->
                <div class="col-md-6 col-xl-4">
                    <aside class="pbmit-two-column-menu widget">
                        {!! $settings['footer_menu_2'] ?? '' !!}
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Area -->
    <div class="pbmit-footer-big-area">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-12 col-xl-6 pbmit-footer-left">
                    <form action="#" method="POST">
                        @csrf
                        <div class="pbmit-newsletter">
                            <h3>Subscribe to Our Newsletter</h3>
                            <div class="pbmit-footer-email-button">
                                <input type="email" name="email" placeholder="Your email address" required>
                                <button class="pbmit-btn" type="submit">
                                    <span class="pbmit-button-content-wrapper">
                                        <span class="pbmit-button-text">Subscribe</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 col-xl-6 pbmit-footer-right">
                    <div class="pbmit-footer-bg-image">
                        <img src="{{ image($settings['footer_newsletter_image'] ?? null, 'default_image') }}" alt="Newsletter">
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
                            Copyright © {{ date('Y') }} <a href="{{ url('/') }}">{{ $settings['general']['site_name'] ?? config('app.name') }}</a>, All Rights Reserved.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pbmit-footer-social-area">
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
    </div>
</footer>
