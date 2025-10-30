<section class="pbmit-extend-animation section-xl pbmit-bg-color-secondary service-three">
	<div class="container pbmit-col-stretched-yes pbmit-col-right">
		<div class="pbmit-col-stretched-right">
			<div class="row">
				<div class="col-md-12 col-lg-3 pbmit-servicebox-left">
					<div>
						<div class="pbmit-heading-subheading animation-style2">
							@if(!empty($block['data']['subtitle']))
								<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
							@endif
							<h2 class="pbmit-title">{{ $block['data']['title'] ?? 'Different needs, exceptional solutions.' }}</h2>
							@if(!empty($block['data']['description']))
								<div class="pbmit-heading-desc">
									{{ $block['data']['description'] }}
								</div>
							@endif
						</div>
						<div class="service-arrow swiper-btn-custom d-inline-flex flex-row-reverse"></div>
					</div>
					@if(!empty($block['data']['highlight_text']))
						<div class="pbmit-service-highlight">
							<h2>{{ $block['data']['highlight_text'] }}</h2>
						</div>
					@endif
				</div>
				<div class="pbmit-servicebox-right col-md-12 col-lg-9">
					<div class="swiper-slider" data-arrows-class="service-arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="2.6" data-margin="30" data-effect="slide">
						<div class="swiper-wrapper">
							@foreach($block['data']['services'] ?? [] as $index => $service)
								<article class="pbmit-ele-service pbmit-service-style-3 swiper-slide">
									<div class="pbminfotech-post-item">
										<div class="pbminfotech-box-content">
											<div class="pbmit-service-image-wrapper">
												<div class="pbmit-featured-img-wrapper">
													<div class="pbmit-featured-wrapper">
														<img src="{{ image($service['image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '.jpg', 'section_image') }}" class="img-fluid" alt="{{ $service['title'] ?? '' }}">
													</div>
												</div>
											</div>
											<div class="pbminfotech-box-number">{{ $service['number'] ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
											@if(!empty($service['icon']))
												<div class="pbmit-service-icon elementor-icon">
													<i class="{{ $service['icon'] }}"></i>
												</div>
											@else
												<div class="pbmit-service-icon elementor-icon">
													<i class=""></i>
												</div>
											@endif
											<div class="pbmit-content-box">
												<div class="pbmit-serv-cat">
													<a href="{{ $service['link'] ?? '#' }}" rel="tag">{{ $service['category'] ?? '' }}</a>
												</div>
												<h3 class="pbmit-service-title">
													<a href="{{ $service['link'] ?? 'service-details.html' }}">{{ $service['title'] ?? '' }}</a>
												</h3>
											</div>
										</div>
										<a class="pbmit-service-btn" href="{{ $service['link'] ?? 'service-details.html' }}" title="{{ $service['title'] ?? '' }}">
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
		</div>
	</div>
</section>
