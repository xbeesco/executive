{{-- Services Grid Section --}}
<section class="services-grid-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2>{{ $settings['content_data']['services_title'] ?? 'Our Services' }}</h2>
                <p class="lead">{{ $settings['content_data']['services_subtitle'] ?? 'Comprehensive design solutions for every need' }}</p>
            </div>
        </div>
        <div class="row g-4">
            @if(isset($settings['content_data']['services']) && is_array($settings['content_data']['services']))
                @foreach($settings['content_data']['services'] as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="{{ $service['icon'] ?? 'fas fa-home' }}"></i>
                            </div>
                            <div class="service-content">
                                <h4>{{ $service['title'] ?? 'Service Title' }}</h4>
                                <p>{{ $service['description'] ?? 'Service description goes here.' }}</p>
                                @if(isset($service['features']) && is_array($service['features']))
                                    <ul class="service-features">
                                        @foreach($service['features'] as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="service-footer">
                                <a href="{{ $service['link'] ?? '#' }}" class="btn btn-outline-primary">
                                    {{ $service['button_text'] ?? 'Learn More' }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Default services if none configured --}}
                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="service-content">
                            <h4>Interior Design</h4>
                            <p>Complete interior design solutions for residential and commercial spaces.</p>
                        </div>
                        <div class="service-footer">
                            <a href="#" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <div class="service-content">
                            <h4>Space Planning</h4>
                            <p>Optimize your space with our professional planning and layout services.</p>
                        </div>
                        <div class="service-footer">
                            <a href="#" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="service-content">
                            <h4>Lighting Design</h4>
                            <p>Create the perfect ambiance with our custom lighting solutions.</p>
                        </div>
                        <div class="service-footer">
                            <a href="#" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>