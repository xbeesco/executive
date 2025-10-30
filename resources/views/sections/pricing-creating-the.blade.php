            <section class="service-section-five">
				<div class="container pbmit-col-stretched-yes pbmit-col-right">
					<div class="pbmit-col-stretched-right">
						<div class="row g-0">
							<div class="col-md-12 col-lg-3">
								<div class="service-five-header-area">
									<div class="pbmit-heading-subheading animation-style4">
										@if(!empty($block['data']['subtitle']))
										<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
										@endif
										<h2 class="pbmit-title">{{ $block['data']['title'] ?? '' }}</h2>
									</div>
									<div class="service-five-arrow swiper-btn-custom d-inline-flex flex-row-reverse"></div>
									<div class="fid-style-area">
										<div class="pbminfotech-ele-fid-style-6">
											<div class="pbmit-fld-contents">
												<div class="pbmit-fld-wrap">
													<h4 class="pbmit-fid-inner">
														<span class="pbmit-fid-before"></span>
														<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $block['data']['counter_number'] ?? 0 }}" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">{{ $block['data']['counter_number'] ?? 0 }}</span>
														@if(!empty($block['data']['counter_suffix']))
														<span class="pbmit-fid"><span>{{ $block['data']['counter_suffix'] }}</span></span>
														@endif
													</h4>
													<span class="pbmit-fid-title">{!! nl2br(str_replace('<br>', "\n", $block['data']['counter_text'] ?? '')) !!}</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-lg-9 service-five-right-col" @if(!empty($block['data']['background_image'])) style="background-image: url('{{ image($block['data']['background_image'], 'section_background') }}')" @endif>
								<div class="swiper-slider" data-arrows-class="service-five-arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="2.6" data-margin="30" data-effect="slide">
									<div class="swiper-wrapper">
										@foreach($block['data']['services'] ?? [] as $service)
										<!-- Slide{{ $loop->iteration }} -->
										<article class="pbmit-ele-service pbmit-service-style-1 swiper-slide">
											<div class="pbminfotech-post-item">
												<div class="pbmit-box-content-wrap">
													@if(!empty($service['image']))
													<div class="pbmit-service-image-wrapper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<img src="{{ image($service['image'], 'section_image') }}" class="img-fluid" alt="{{ $service['title'] ?? '' }}">
															</div>
														</div>
													</div>
													@endif
													<div class="pbmit-service-icon elementor-icon">
														<i class=""></i>
													</div>
													<div class="pbmit-box-content-inner">
														<div class="pbmit-content-box">
															@if(!empty($service['number']))
															<div class="pbminfotech-box-number">{{ $service['number'] }}</div>
															@endif
															@if(!empty($service['category']))
															<div class="pbmit-serv-cat">
																<a href="#" rel="tag">{{ $service['category'] }}</a>
															</div>
															@endif
															<h3 class="pbmit-service-title">
																@if(!empty($service['link']))
																<a href="{{ $service['link'] }}">{{ $service['title'] }}</a>
																@else
																{{ $service['title'] }}
																@endif
															</h3>
															@if(!empty($service['description']))
															<div class="pbmit-service-description">
																<p>{{ $service['description'] }}</p>
															</div>
															@endif
														</div>
													</div>
												</div>
												@if(!empty($service['link']))
												<a class="pbmit-service-btn" href="{{ $service['link'] }}" title="{{ $service['title'] }}">
													<span class="pbmit-button-icon">
														<i class="{{ $service['button_icon'] ?? 'pbmit-base-icon-pbmit-up-arrow' }}"></i>
													</span>
												</a>
												@endif
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
