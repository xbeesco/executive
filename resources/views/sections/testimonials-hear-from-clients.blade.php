			<section class="testimonial-two pbmit-bg-color-secondary pbmit-extend-animation">
				<div class="container">
					<div class="position-relative">
						<div class="row g-0">
							<div class="col-md-12 col-xl-5">
								<div class="pbmit-testimonialbox-left">
									<div class="pbmit-heading-subheading animation-style3">
										<h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
										@if(!empty($block['data']['description']))
											<div class="pbmit-heading-desc">
												{{ $block['data']['description'] }}
											</div>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xl-7">
								<div class="swiper-slider" data-autoplay="false" data-loop="false" data-dots="false" data-arrows="true" data-columns="1" data-margin="30" data-effect="slide">
									<div class="swiper-wrapper">
										@foreach($block['data']['testimonials'] ?? [] as $testimonialIndex => $testimonial)
										<!-- Slide{{ $testimonialIndex + 1 }} -->
										<article class="pbmit-testimonial-style-2 swiper-slide">
												<div class="pbminfotech-post-item">
													<div class="pbminfotech-box-content">
														<div class="pbminfotech-box-img" style="background-image: url('{{ image($testimonial['author_image'], 'section_background') }}')">
															<div class="pbmit-featured-img-wrapper">
																<div class="pbmit-featured-wrapper">
																	<img src="{{ image($testimonial['author_image'], 'section_image') }}" class="img-fluid" alt="">
																</div>
															</div>
														</div>
														<div class="pbminfotech-box-content-inner">
															<div class="pbminfotech-box-star-ratings">
																@for($i = 1; $i <= 5; $i++)
																	<i class="pbmit-base-icon-star-1 @if($i <= ($testimonial['rating'] ?? 5)) pbmit-active @endif"></i>
																@endfor
															</div>
															<blockquote class="pbminfotech-testimonial-text">
																<p>{{ $testimonial['content'] ?? '' }}</p>
															</blockquote>
															<div class="pbminfotech-box-author">
																<h3 class="pbminfotech-box-title">{{ $testimonial['author_name'] ?? '' }}</h3>
																@if(!empty($testimonial['author_position']))
																	<div class="pbminfotech-testimonial-detail">{{ $testimonial['author_position'] }}</div>
																@endif
															</div>
														</div>
													</div>
												</div>
											</article>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="ihbox-style-area">
							<div class="pbmit-ihbox-style-2">
								<div class="pbmit-ihbox-headingicon">
									<div class="pbmit-ihbox-contents d-flex align-items-center">
										<div class="pbmit-title-wrap">
											<h2 class="pbmit-element-title">{{ $block['data']['rating'] }}</h2>
										</div>
										<div class="pbmit-icon-wrap">
											<div class="pbmit-ihbox-svg">
												<div class="pbmit-ihbox-svg-wrapper">
													<svg xmlns="http://www.w3.org/2000/svg" width="512" height="90.51" viewBox="0 0 512 90.51">
														<path d="M89.26,29.43l-24.9-3.62L53.23,3.33c-2.2-4.44-9.48-4.44-11.68,0L30.42,25.81,5.58,29.43A6.52,6.52,0,0,0,2,40.55L20,58.11,15.74,82.88a6.51,6.51,0,0,0,9.46,6.87l22.19-11.7,22.25,11.7a6.5,6.5,0,0,0,3,.75,6.51,6.51,0,0,0,6.43-7.62L74.86,58.11l18-17.56a6.52,6.52,0,0,0-3.62-11.12Z"></path>
														<path d="M193.55,29.43l-24.9-3.62L157.52,3.33c-2.2-4.44-9.48-4.44-11.68,0L134.71,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56L120,82.88a6.52,6.52,0,0,0,9.47,6.87l22.19-11.7,22.25,11.7a6.5,6.5,0,0,0,3,.75,6.51,6.51,0,0,0,6.43-7.62l-4.24-24.77,18-17.56a6.52,6.52,0,0,0-3.62-11.12Z"></path>
														<path d="M297.84,29.43l-24.9-3.62L261.81,3.33c-2.2-4.44-9.48-4.44-11.68,0L239,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56-4.25,24.77a6.52,6.52,0,0,0,9.47,6.87L256,78.05l22.25,11.7a6.5,6.5,0,0,0,3,.75,6.51,6.51,0,0,0,6.43-7.62l-4.24-24.77,18-17.56a6.52,6.52,0,0,0-3.62-11.12Z"></path>
														<path d="M402.13,29.43l-24.9-3.62L366.1,3.33c-2.2-4.44-9.48-4.44-11.69,0L343.29,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56L328.6,82.88a6.52,6.52,0,0,0,9.47,6.87l22.18-11.7,22.26,11.7a6.5,6.5,0,0,0,3,.75A6.51,6.51,0,0,0,392,82.88l-4.24-24.77,18-17.56a6.52,6.52,0,0,0-3.61-11.12Z"></path>
														<path d="M511.68,33.86a6.54,6.54,0,0,0-5.26-4.43l-24.9-3.62L470.39,3.33c-2.2-4.44-9.48-4.44-11.69,0L447.58,25.81l-24.84,3.62a6.52,6.52,0,0,0-3.61,11.12l18,17.56-4.25,24.77a6.52,6.52,0,0,0,6.42,7.62,6.61,6.61,0,0,0,3.05-.75l22.19-11.7,22.26,11.7a6.46,6.46,0,0,0,6.86-.5,6.53,6.53,0,0,0,2.59-6.37L492,58.11l18-17.56A6.54,6.54,0,0,0,511.68,33.86Z"></path>
													</svg>
												</div>
											</div>
											<h4 class="pbmit-element-heading">
												{{ $block['data']['total_reviews'] }}
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
						@if(!empty($block['data']['client_logos']) && count($block['data']['client_logos']) > 0)
							<div class="swiper-slider client-two-area" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="6" data-margin="0" data-effect="slide">
								<div class="swiper-wrapper">
									@foreach($block['data']['client_logos'] ?? [] as $logoIndex => $logo)
								<!-- Slide{{ $logoIndex + 1 }} -->
								<article class="pbmit-client-style-3 swiper-slide">
											<div class="pbmit-border-wrapper">
												<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
													<h4 class="pbmit-hide">{{ $logo['name'] ?? '' }}</h4>
													@if(!empty($logo['logo_color']))
														<div class="pbmit-client-hover-img">
															<img src="{{ image($logo['logo_color'], 'section_image') }}" alt="">
														</div>
													@endif
													<div class="pbmit-featured-img-wrapper">
														<div class="pbmit-featured-wrapper">
															<img src="{{ image($logo['logo_grey'] ?? $logo['logo_white'] ?? $logo['logo_color'], 'section_image') }}" class="img-fluid" alt="">
														</div>
													</div>
												</div>
											</div>
										</article>
									@endforeach
								</div>
							</div>
						@endif
					</div>
				</div>
            </section>
