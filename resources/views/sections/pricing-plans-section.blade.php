{{-- Pricing Plans Section --}}
<section class="pricing-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2>{{ $settings['content_data']['pricing_title'] ?? 'Choose Your Plan' }}</h2>
                <p>{{ $settings['content_data']['pricing_subtitle'] ?? 'Select the perfect package for your needs' }}</p>
            </div>
        </div>
        <div class="row">
            @if(isset($settings['content_data']['pricing_plans']) && is_array($settings['content_data']['pricing_plans']))
                @foreach($settings['content_data']['pricing_plans'] as $plan)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="pricing-card {{ $plan['featured'] ?? false ? 'featured' : '' }}">
                            <div class="pricing-header">
                                <h3>{{ $plan['name'] ?? 'Plan Name' }}</h3>
                                <div class="price">
                                    <span class="currency">$</span>
                                    <span class="amount">{{ $plan['price'] ?? '99' }}</span>
                                    <span class="period">/{{ $plan['period'] ?? 'month' }}</span>
                                </div>
                            </div>
                            <div class="pricing-features">
                                @if(isset($plan['features']) && is_array($plan['features']))
                                    <ul>
                                        @foreach($plan['features'] as $feature)
                                            <li><i class="fas fa-check"></i> {{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="pricing-footer">
                                <a href="#" class="btn btn-primary">{{ $plan['button_text'] ?? 'Get Started' }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Default pricing plans if none configured --}}
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3>Basic</h3>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">99</span>
                                <span class="period">/month</span>
                            </div>
                        </div>
                        <div class="pricing-features">
                            <ul>
                                <li><i class="fas fa-check"></i> Basic Design Consultation</li>
                                <li><i class="fas fa-check"></i> 2 Design Concepts</li>
                                <li><i class="fas fa-check"></i> Email Support</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>