@php
    $data = $block['data'] ?? $block;
    $items = $data['items'] ?? [];
@endphp
<section class="pbmit-element-portfolio-style-4 portfolio-section-five">
				<div class="container-fluid p-0">
					<div class="pbmit-main-hover-faded">
						<div class="pbmit-content-box">
							<div class="swiper-slider swiper-hover-slide-nav" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="false" data-columns="3" data-margin="0" data-effect="slide">
								<div class="swiper-wrapper">
@foreach($items as $index => $item)
					@if(empty($item['title']) && empty($item['category']))
						@continue
					@endif
									<!-- Slide{{ $index + 1 }} -->
									<div class="swiper-slide">
										<div class="pbmit-content-box-inner">
											<div class="pbmit-titlebox-wrap">
												<div class="pbmit-titlebox">
													<div class="pbmit-port-cat">
														<a href="portfolio-grid-col-3.html" rel="tag">{{ $item['category'] ?? '' }}</a>
													</div>
													<h3 class="pbmit-portfolio-title">
														<a href="portfolio-detail-style-1.html">{{ $item['title'] ?? '' }}</a>
													</h3>
												</div>
												<div class="pbmit-portfolio-btn">
													<a href="portfolio-detail-style-1.html">
														<i class="pbmit-base-icon-pbmit-up-arrow"></i>
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
@foreach($items as $index => $item)
					@if(empty($item['title']) && empty($item['category']))
						@continue
					@endif
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="{{ image($item['image'], 'section_image') }}" class="{{ $index < 6 ? 'img-fluid' : '' }}" alt="{{ $item['alt'] ?? 'portfolio-' . sprintf('%02d', $index + 1) }}">
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
