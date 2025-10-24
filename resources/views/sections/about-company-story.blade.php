{{-- Company About Section --}}
<section class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <h2>{{ $settings['content_data']['about_title'] ?? 'About Executive' }}</h2>
                    <p class="lead">{{ $settings['content_data']['about_subtitle'] ?? 'Creating exceptional designs since our beginning' }}</p>
                    <p>{{ $settings['content_data']['about_description'] ?? 'We are a team of passionate designers dedicated to creating beautiful, functional spaces that reflect your unique style and needs.' }}</p>
                    
                    @if(isset($settings['content_data']['about_features']) && is_array($settings['content_data']['about_features']))
                        <ul class="about-features">
                            @foreach($settings['content_data']['about_features'] as $feature)
                                <li><i class="fas fa-check"></i> {{ $feature }}</li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="about-features">
                            <li><i class="fas fa-check"></i> Professional Design Team</li>
                            <li><i class="fas fa-check"></i> Custom Solutions</li>
                            <li><i class="fas fa-check"></i> Quality Guarantee</li>
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="{{ $settings['content_data']['about_image'] ?? '/images/about-us.jpg' }}" 
                         alt="About Executive" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>