{{-- Example Features Section --}}
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2>{{ $settings['content_data']['features_title'] ?? 'What We Offer' }}</h2>
                <p>{{ $settings['content_data']['features_subtitle'] ?? 'Discover our amazing services' }}</p>
            </div>
        </div>
        <div class="row">
            @if(isset($settings['content_data']['features']) && is_array($settings['content_data']['features']))
                @foreach($settings['content_data']['features'] as $feature)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-item text-center">
                            <div class="feature-icon">
                                <i class="{{ $feature['icon'] ?? 'fas fa-star' }}"></i>
                            </div>
                            <h4>{{ $feature['title'] ?? 'Feature Title' }}</h4>
                            <p>{{ $feature['description'] ?? 'Feature description goes here.' }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Default features if none configured --}}
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Interior Design</h4>
                        <p>Professional interior design services for modern homes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h4>Custom Solutions</h4>
                        <p>Tailored design solutions to match your unique style.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Expert Team</h4>
                        <p>Work with our experienced design professionals.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>