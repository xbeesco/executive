<section class="service-section-four">
    <div class="container pbmit-col-stretched-yes pbmit-col-right">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="pbmit-heading-subheading animation-style4">
                    @if(!empty($block['data']['subtitle']))
                    <h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
                    @endif
                    <h2 class="pbmit-title">{{ $block['data']['title'] ?? '' ?? '' }}</h2>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 text-end">
                <div class="service-four-swiper-arrow swiper-btn-custom d-inline-flex flex-row-reverse"></div>
            </div>
        </div>
        <div class="pbmit-col-stretched-right">
            <div class="swiper-slider" data-arrows-class="service-four-swiper-arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="3.6" data-margin="40" data-effect="slide">
                <div class="swiper-wrapper">
                    @foreach($block['data']['services'] ?? [] as $service)
                    <!-- Slide{{ $loop->iteration }} -->
                    <article class="pbmit-ele-service pbmit-service-style-4 swiper-slide">
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
                                    @if(!empty($service['category'] ?? ''))
                                    <div class="pbmit-serv-cat">
                                        <a href="#" rel="tag">{{ $service['category'] ?? '' }}</a>
                                    </div>
                                    @endif
                                    <h3 class="pbmit-service-title">
                                        <a href="{{ $service['link'] ?? '#' ?? 'service-details.html' }}">{{ $service['title'] ?? '' }}</a>
                                    </h3>
                                    @if(!empty($service['description'] ?? ''))
                                    <div class="pbmit-service-description">
                                        <p>{{ $service['description'] ?? '' }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <a class="pbmit-service-btn" href="{{ $service['link'] ?? '#' ?? 'service-details.html' }}" title="{{ $service['title'] ?? '' }}">
                                <span class="pbmit-button-icon">
                                    <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                                </span>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
