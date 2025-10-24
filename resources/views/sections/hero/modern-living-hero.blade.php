{{-- Modern Living Hero Section --}}
<section class="modern-hero-section">
    <div class="hero-background" style="background-image: url('{{ $settings['content_data']['hero_bg_image'] ?? '/images/hero-bg.jpg' }}');">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content text-white">
                        <h1 class="display-4 fw-bold mb-4">
                            {{ $settings['content_data']['modern_hero_title'] ?? 'Modern Living Area Design' }}
                        </h1>
                        <p class="lead mb-4">
                            {{ $settings['content_data']['modern_hero_subtitle'] ?? 'Creating contemporary spaces that blend functionality with aesthetic appeal' }}
                        </p>
                        <div class="hero-buttons">
                            <a href="#" class="btn btn-primary btn-lg me-3">
                                {{ $settings['content_data']['hero_primary_button'] ?? 'View Portfolio' }}
                            </a>
                            <a href="#" class="btn btn-outline-light btn-lg">
                                {{ $settings['content_data']['hero_secondary_button'] ?? 'Contact Us' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>