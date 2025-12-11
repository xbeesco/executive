<section class="service-section-nine pbmit-sticky-section">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-6 pbmit-sticky-col">
                <div class="service-nine-left-box">
                    <div class="text-start">
                        <img src="{{ image($block['data']['left_main_image'], 'section_image') }}" class="service-left-img img-fluid" alt="">
                    </div>
                    <div class="ihbox-style-23-area">
                        <div class="ihbox-style-23-wrap">
                            <div class="pbmit-ihbox-style-23">
                                <div class="pbmit-ihbox-box">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
                                            <img src="{{ image($block['data']['icon_box_image'], 'section_image') }}" class="img-fluid" alt="Join our 5000+ satisfied client">
                                        </div>
                                    </div>
                                    <div class="pbmit-content-wrapper">
                                        <h2 class="pbmit-element-title">{{ $block['data']['icon_box_text'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ihbox-style-18-area icon-heading-style-18-new">
                        <div class="ihbox-style-18-wrap">
                            <div class="pbmit-ihbox-style-18">
                                <div class="pbmit-ihbox-headingicon d-flex align-items-center">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                            <i class="{{ $block['data']['phone_icon'] }}"></i>
                                        </div>
                                    </div>
                                    <div class="pbmit-ihbox-contents">
                                        <h2 class="pbmit-element-title">
                                            <a class="pbmit-button-inner" href="tel:{{ $block['data']['phone_number'] }}">
                                                <span class="pbmit-button-wrapper">
                                                    <span class="pbmit-button-text">{{ $block['data']['phone_number'] }}</span>
                                                </span>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="service-nine-right-box">
                    <div class="pbmit-heading-subheading animation-style4">
                        <h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
                        <h2 class="pbmit-title">{{ $block['data']['title'] ?? '' }}</h2>
                    </div>
                    <div class="row">
                        @foreach(($block['data']['services'] ?? []) as $service)
                            <article class="pbmit-service-style-7 pbmit-ele-service col-md-6">
                                <div class="pbminfotech-post-item">
                                    <div class="pbminfotech-box-content">
                                        <div class="pbmit-service-image-wrapper">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <img src="{{ image($service['image'] ?? '', 'section_image') }}" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pbmit-service-icon">
                                            <i class=""></i>
                                        </div>
                                        <div class="pbmit-content-box">
                                            <div class="pbmit-serv-cat">
                                                <a href="#" rel="tag">{{ $service['category'] ?? '' ?? '' }}</a>
                                            </div>
                                            <h3 class="pbmit-service-title">
                                                <a href="{{ $service['link'] ?? '#' }}">{{ $service['title'] ?? '' ?? '' }}</a>
                                            </h3>
                                            @if(!empty($service['description'] ?? ''))
                                                <div class="pbmit-service-description">
                                                    <p>{{ $service['description'] ?? '' }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <a class="pbmit-service-btn" href="{{ $service['link'] ?? '#' }}" title="{{ $service['title'] ?? '' ?? '' }}">
                                        <span class="pbmit-button-icon">
                                            <i class="{{ $service['button_icon'] ?? 'pbmit-base-icon-pbmit-up-arrow' }}"></i>
                                        </span>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
