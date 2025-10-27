<footer class="site-footer footer-style-1 pbmit-bg-color-secondary">
    <div class="footer-wrap pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <aside class="widget pbmit-two-column-menu">
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
                <div class="col-md-4">
                    <aside class="widget">
                        <div class="textwidget">
                            <div class="pbmit-footer-logo">
                                <img src="{{ image($settings['general']['site_logo'] ?? null, 'site_logo') }}" alt="{{ $settings['general']['site_name'] ?? config('app.name') }}">
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-4">
                    <aside class="widget pbmit-two-column-menu">
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
    <div class="pbmit-footer-big-area-wrapper">
        <div class="footer-wrap pbmit-footer-big-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 pbmit-footer-left">
                        @if(!empty($settings['general']['site_email']))
                        <span class="pbmit-email-text"> {{ $settings['general']['site_email'] }}</span>
                        @endif
                        @if(!empty($settings['general']['site_phone']))
                        <span class="pbmit-phone-number"> {{ $settings['general']['site_phone'] }}</span>
                        @endif
                    </div>
                    <div class="col-md-4 pbmit-footer-right">
                        @if(!empty($settings['general']['site_address']))
                        <span class="pbmit-address"> {!! nl2br(e($settings['general']['site_address'])) !!}</span>
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
    <div class="pbmit-footer-text-area">
        <div class="container">
            <div class="pbmit-footer-text-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pbmit-footer-copyright-text-area">
                            @php
                                $siteName = $settings['general']['site_name'] ?? config('app.name');
                                $copyright = $settings['footer_copyright'] ?? 'Copyright � ' . date('Y') . ' {{site_name}}, All Rights Reserved.';
                                echo str_replace('{{site_name}}', $siteName, $copyright);
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
