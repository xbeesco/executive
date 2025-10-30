<!-- Slider Section -->
<section class="ihbox-section-two">
    <div class="container-fluid p-0">
        <div class="swiper-slider" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="false" data-columns="4" data-margin="30" data-effect="slide">
            <div class="swiper-wrapper">
                @foreach ($block['data']['slides'] ?? [] as $slide)
                    <!-- Slide {{ $loop->iteration }} -->
                    <article class="pbmit-miconheading-style-7 swiper-slide">
                        <div class="pbmit-ihbox-style-7">
                            <div class="pbmit-ihbox-box">
                                <div class="pbmit-icon-wrapper d-flex align-items-center">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper">
                                            <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                <i class="pbmit-xinterio-icon {{ $slide['icon'] ?? 'pbmit-xinterio-icon-tools' }}"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pbmit-title-wrap">
                                        <h2 class="pbmit-element-title">
                                            {{ $slide['title'] ?? 'Title Here' }}
                                        </h2>
                                    </div>
                                </div>
                                <div class="pbmit-content-wrapper">
                                    <div class="pbmit-heading-desc">{{ $slide['description'] ?? '' }}</div>
                                </div>
                            </div>
                            <div class="pbmit-ihbox-btn">
                                <a class="pbmit-button-inner" href="about-us.html">
                                    <span class="pbmit-button-wrapper">
                                        <span class="pbmit-button-text">Read More</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Slider End -->
