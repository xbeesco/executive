{{-- Example Hero Section --}}
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-content">
                    <h1>{{ $settings['general']['hero_title'] ?? 'Welcome to Executive' }}</h1>
                    <p>{{ $settings['general']['hero_subtitle'] ?? 'Creating exceptional designs for modern living' }}</p>
                    <a href="#" class="btn btn-primary">{{ $settings['general']['hero_button_text'] ?? 'Get Started' }}</a>
                </div>
            </div>
        </div>
    </div>
</section>