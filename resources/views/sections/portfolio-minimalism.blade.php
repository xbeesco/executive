@php
    // Get configuration values
    $columns = $block['data']['columns'] ?? '3';
    $autoplay = $block['data']['autoplay'] ?? false;
    $items = $block['data']['items'] ?? [];
@endphp

<section class="pbmit-element-portfolio-style-4 portfolio-section-five">
    <div class="container-fluid p-0">
        <div class="pbmit-main-hover-faded">
            <div class="pbmit-content-box">
                <div class="swiper-slider swiper-hover-slide-nav"
                     data-autoplay="{{ $autoplay ? 'true' : 'false' }}"
                     data-loop="true"
                     data-dots="false"
                     data-arrows="false"
                     data-columns="{{ $columns }}"
                     data-margin="0"
                     data-effect="slide">
                    <div class="swiper-wrapper">
                        @foreach($items as $item)
                            <!-- Slide{{ $loop->iteration }} -->
                            <div class="swiper-slide">
                                <div class="pbmit-content-box-inner">
                                    <div class="pbmit-titlebox-wrap">
                                        <div class="pbmit-titlebox">
                                            @if(!empty($item['category']))
                                            @php
                                                $categoryModel = \App\Models\Category::where('slug', $item['category'])->first();
                                            @endphp
                                            @if($categoryModel)
                                            <div class="pbmit-port-cat">
                                                <a href="#" rel="tag">{{ $categoryModel->name }}</a>
                                            </div>
                                            @endif
                                            @endif
                                            <h3 class="pbmit-portfolio-title">
                                                <a href="{{ $item['link'] ?? '#' }}">{{ $item['title'] ?? '' }}</a>
                                            </h3>
                                        </div>
                                        <div class="pbmit-portfolio-btn">
                                            <a href="{{ $item['link'] ?? '#' }}">
                                                <i class="{{ $item['button_icon'] ?? 'pbmit-base-icon-pbmit-up-arrow' }}"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="swiper-hover-slide-images">
                <div class="swiper-slider pbmit-hover-image-faded">
                    <div class="swiper-wrapper">
                        @foreach($items as $item)
                            <div class="swiper-slide">
                                <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                        @php
                                            $imageNumber = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                                            $defaultImage = "https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-{$imageNumber}.jpg";
                                        @endphp
                                        <img src="{{ image($item['image'] ?? $defaultImage, 'section_image') }}"
                                             class="{{ $loop->iteration <= 6 ? 'img-fluid' : '' }}"
                                             alt="{{ $item['title'] ?? 'portfolio-' . $imageNumber }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
