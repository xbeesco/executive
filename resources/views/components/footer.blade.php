<footer class="footer footer-style-{{ $style ?? 3 }}">
    <div class="footer-content">
        <div class="container">
            <div class="footer-sections">
                @php
                    $general = \App\Services\SettingService::getGeneral();
                    $socialLinks = \App\Services\SettingService::getSocialLinks();
                @endphp

                <section class="footer-section">
                    <h3>{{ $general['site_name'] ?? config('app.name') }}</h3>
                    @if($general['site_address'] ?? null)
                        <p>{{ $general['site_address'] }}</p>
                    @endif
                </section>

                @if($socialLinks)
                    <section class="footer-section">
                        <h4>Follow Us</h4>
                        <div class="social-links">
                            @foreach($socialLinks as $name => $url)
                                <a href="{{ $url }}" class="social-link social-{{ $name }}">{{ ucfirst($name) }}</a>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ $general['site_name'] ?? config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
