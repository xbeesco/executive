            <section class="section-xl pbmit-element-static-box-style-4">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style4">
						<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] ?? 'Excellence Since 1986' }}</h4>
						<h2 class="pbmit-title">{{ $block['data']['title'] ?? 'Our Executive Service Process' }}</h2>
					</div>
					<div class="row">
						<div class="pbmit-main-static-slider d-flex" style="background-image: url('{{ image($block['data']['background_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/bg/static-box-pattern-img.png', 'section_background', $loop->iteration) }}');">
							<div class="swiper-static-slide-nav col-md-4">
								<ul class="pbmit-hover-inner">
									@foreach($block['data']['steps'] ?? [] as $step)
										<li class="pbmit-title-wrapper">
											<div class="pbmit-static-box-number">
												<div class="pbmit-box-number">{{ $step['number'] ?? '' }}</div>
											</div>
										</li>
									@endforeach
								</ul>
							</div>
							<div class="pbmit-static-title-desc col-md-4">
								<div class="pbmit-static-title-desc-inner">
									<div class="swiper-slider pbmit-static-desc">
										<div class="swiper-wrapper">
											@foreach($block['data']['steps'] ?? [] as $step)
												<div class="swiper-slide">
													<div class="pbmit-content-box">
														<div class="pbmit-static-box-title">
															<h5>{{ $step['title'] ?? '' }}</h5>
														</div>
														<div class="pbmit-static-box-desc">{{ $step['description'] ?? '' }}</div>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-static-slide-images col-md-4">
								<div class="swiper-slider pbmit-static-image">
									<div class="swiper-wrapper">
										@foreach($block['data']['steps'] ?? [] as $stepIndex => $step)
											<div class="swiper-slide">
												<img src="{{ image($step['image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/static-box/static-box-img-0' . ($stepIndex + 1) . '.jpg', 'section_image', $loop->parent->iteration + $stepIndex) }}" alt="{{ $step['title'] ?? '' }}">
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>
