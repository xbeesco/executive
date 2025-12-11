            <section class="service-section-seven">
				<div class="container p-0">
					@if(!empty($block['data']['title'] ?? ''))
					<div class="pbmit-heading animation-style4">
						<h2 class="pbmit-title">{{ $block['data']['title'] ?? '' }}</h2>
					</div>
					@endif
					<div class="swiper-slider" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="false" data-columns="3" data-margin="30" data-effect="slide">
						<div class="swiper-wrapper">
							@if(!empty($block['data']['services']))
								@foreach($block['data']['services'] as $service)
								<!-- Slide{{ $loop->iteration }} -->
								<article class="pbmit-service-style-5 swiper-slide">
									<div class="pbminfotech-post-item">
										<div class="pbmit-box-content-wrap">
											<div class="pbmit-service-image-wrapper">
												<div class="pbmit-featured-img-wrapper">
													<div class="pbmit-featured-wrapper">
														<img src="{{ image($service['image'] ?? '', 'section_image') }}" class="img-fluid" alt="service-04">
													</div>
												</div>
												@if(!empty($service['link'] ?? '#'))
												<div class="pbmit-service-btn-wrapper">
													<a class="pbmit-service-btn" href="{{ $service['link'] ?? '#' }}" title="{{ $service['title'] ?? '' ?? '' }}">
														<span class="pbmit-button-icon">
															<i class="{{ $service['button_icon'] ?? 'pbmit-base-icon-pbmit-up-arrow' }}"></i>
														</span>
													</a>
												</div>
												<a class="pbmit-link" href="{{ $service['link'] ?? '#' }}"></a>
												@endif
											</div>
											<div class="pbmit-content-box">
												@if(!empty($service['number'] ?? ''))
												<div class="pbminfotech-box-number">{{ $service['number'] ?? '' }}</div>
												@endif
												@if(!empty($service['category'] ?? ''))
												<div class="pbmit-serv-cat">
													<a href="#" rel="tag">{{ $service['category'] ?? '' }}</a>
												</div>
												@endif
												@if(!empty($service['title'] ?? ''))
												<h3 class="pbmit-service-title">
													@if(!empty($service['link'] ?? '#'))
													<a href="{{ $service['link'] ?? '#' }}">{{ $service['title'] ?? '' }}</a>
													@else
													{{ $service['title'] ?? '' }}
													@endif
												</h3>
												@endif
												@if(!empty($service['description'] ?? ''))
												<div class="pbmit-service-description">
													<p>{{ $service['description'] ?? '' }}</p>
												</div>
												@endif
												@if(!empty($service['icon']))
												<div class="pbmit-service-icon">
													<i class="{{ icon_class($service['icon']) }}"></i>
												</div>
												@endif
											</div>
										</div>
									</div>
								</article>
								@endforeach
							@endif
						</div>
					</div>
					@if(!empty($block['data']['clock_image']))
					<div class="clock-img">
						<img src="{{ image($block['data']['clock_image'], 'section_image') }}" alt="">
					</div>
					@endif
					@if(!empty($block['data']['frame_image']))
					<div class="frame-img">
						<img src="{{ image($block['data']['frame_image'], 'section_image') }}" alt="">
					</div>
					@endif
				</div>
            </section>
