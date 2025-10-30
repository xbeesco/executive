<section class="service-section-four">
    <div class="container pbmit-col-stretched-yes pbmit-col-right">
        @if(!empty($block['data']['title']))
        <div class="row">
            <div class="col-md-12">
                <div class="pbmit-heading-subheading animation-style4">
                    <h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
                </div>
            </div>
        </div>
        @endif
        <div class="pbmit-col-stretched-right">
            <div class="swiper-slider" data-arrows-class="service-four-swiper-arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="3.6" data-margin="40" data-effect="slide">
                <div class="swiper-wrapper">
                    @foreach($block['data']['services'] ?? [] as $service)
                    <!-- Slide {{ $loop->iteration }} -->
                    <article class="pbmit-ele-service pbmit-service-style-4 swiper-slide">
                        <div class="pbminfotech-post-item">
                            <div class="pbminfotech-box-content">
                                <div class="pbmit-service-image-wrapper">
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            @if(!empty($service['image']))
                                            <img src="{{ Storage::url($service['image']) }}" class="img-fluid" alt="{{ $service['title'] ?? '' }}">
                                            @else
                                            <img src="{{ image(sprintf('https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/service/service-%02d.jpg', $loop->iteration), 'section_image') }}" class="img-fluid" alt="{{ $service['title'] ?? '' }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="pbmit-content-box">
                                    <h3 class="pbmit-service-title">
                                        <a href="#">{{ $service['title'] ?? '' }}</a>
                                    </h3>
                                    @if(!empty($service['description']))
                                    <div class="pbmit-service-description">
                                        <p>{{ $service['description'] }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <a class="pbmit-service-btn" href="#" title="{{ $service['title'] ?? '' }}">
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
