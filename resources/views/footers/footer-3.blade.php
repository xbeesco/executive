<footer class="site-footer footer-style-2 pbmit-bg-color-light">
    <div class="footer-wrap pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
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
                            @if(!empty($settings['general']['site_address']))
                            <div class="pbmit-contact-widget-line pbmit-contact-widget-address">{{ $settings['general']['site_address'] }}</div>
                            @endif
                            @if(!empty($settings['general']['site_phone']))
                            <div class="pbmit-contact-widget-line pbmit-contact-widget-phone">{{ $settings['general']['site_phone'] }}</div>
                            @endif
                            @if(!empty($settings['general']['site_email']))
                            <div class="pbmit-contact-widget-line pbmit-contact-widget-email">{{ $settings['general']['site_email'] }}</div>
                            @endif
                        </div>
                    </aside>
                </div>
                <div class="col-md-6 col-xl-4">
                    <aside class="pbmit-two-column-menu widget">
                        @if(!empty($settings['footer_menu_1']) && is_array($settings['footer_menu_1']))
                        <ul>
                            @foreach($settings['footer_menu_1'] as $item)
                            <li><a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] ?? '' }}</a></li>
                            @endforeach
                        </ul>
                        @elseif(!empty($settings['footer_menu_1']))
                        {!! $settings['footer_menu_1'] !!}
                        @endif
                    </aside>
                </div>
                <div class="col-md-6 col-xl-4">
                    <aside class="pbmit-two-column-menu widget">
                        @if(!empty($settings['footer_menu_2']) && is_array($settings['footer_menu_2']))
                        <ul>
                            @foreach($settings['footer_menu_2'] as $item)
                            <li><a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] ?? '' }}</a></li>
                            @endforeach
                        </ul>
                        @elseif(!empty($settings['footer_menu_2']))
                        {!! $settings['footer_menu_2'] !!}
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </div>
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
                        <img src="{{ asset('images/footer-mailchip-img.png') }}" alt="Newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-footer-text-area">
        <div class="container">
            <div class="pbmit-footer-text-inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pbmit-footer-copyright-text-area">
                            @php
                                $siteName = $settings['general']['site_name'] ?? config('app.name');
                                $copyright = $settings['footer_copyright'] ?? 'Copyright � ' . date('Y') . ' {{site_name}}, All Rights Reserved.';
                                echo str_replace('{{site_name}}', $siteName, $copyright);
                            @endphp
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
