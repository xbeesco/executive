			<section class="section-xl pricing-one-bg" style="background-image: url('{{ image($block['data']['background_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-1/bg/pricing-bg-shape.png', 'section_background', $loop->iteration) }}')">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-7">
							<div class="pbminfotech-ele-ptable-style-1">
								<div class="pbmit-ptable-cols row">
									@foreach($block['data']['plans'] ?? [] as $planIndex => $plan)
										<div class="@if($plan['featured'] ?? false) pbmit-pricing-table-featured-col @endif pbmit-ptable-col col-md-6">
											<div class="pbmit-pricing-table-box">
												<div class="pbmit-head-wrap">
													<h3 class="pbminfotech-ptable-heading">{{ $plan['name'] ?? '' }}</h3>
													<div class="pbminfotech-sep"></div>
													<div class="pbmit-price-wrapper">
														<div class="pbmit-ptable-price-w">
															<div class="pbminfotech-ptable-symbol">{{ $plan['currency'] ?? 'EGP' }}</div>
															<div class="pbminfotech-ptable-price">{{ $plan['price'] ?? '' }}</div>
														</div>
														<div class="pbminfotech-ptable-frequency">{{ $plan['period'] ?? '/Mo' }}</div>
													</div>
												</div>
												<div class="pbmit-ptable-inner">
													<div class="pbmit-ptable-lines-w">
														@foreach($plan['features'] ?? [] as $feature)
															<div class="pbmit-ptable-line">{{ $feature['text'] ?? '' }}</div>
														@endforeach
													</div>
													<div class="pbminfotech-ptable-btn">
														<div class="pbmit-button">
															<a class="pbmit-button-inner" href="{{ $plan['button_link'] ?? '#' }}">
																<span class="pbmit-button-wrapper">
																	<span class="pbmit-button-text">{{ $plan['button_text'] ?? 'Select Plan' }}</span>
																</span>
															</a>
														</div>
													</div>
												</div>
												@if($plan['featured'] ?? false)
													<div class="pbmit-feature-wrap">
														<div class="pbmit-ptablebox-featured-w"></div>
													</div>
												@else
													<div class="pbmit-feature-wrap"></div>
												@endif
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-5">
							<div class="pricing-one-rightbox">
								<div class="pbmit-heading-subheading animation-style2">
									<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] ?? 'Membership Plans' }}</h4>
									<h2 class="pbmit-title">{{ $block['data']['title'] ?? 'Choose your executive workspace' }}</h2>
								</div>
								<ul class="list-group list-group-borderless">
									@foreach($block['data']['features'] ?? [] as $feature)
										<li class="list-group-item">
											<span class="pbmit-icon-list-icon">
												<i aria-hidden="true" class="pbmit-xinterio-icon {{ $feature['icon'] ?? 'pbmit-xinterio-icon-check-mark' }}"></i>
											</span>
											<span class="pbmit-icon-list-text">{{ $feature['text'] ?? '' }}</span>
										</li>
									@endforeach
								</ul>
								<a class="pbmit-btn pbmit-btn-outline" href="{{ $block['data']['button_link'] ?? '#' }}">
									<span class="pbmit-button-content-wrapper">
										<span class="pbmit-button-text">{{ $block['data']['button_text'] ?? 'View All Plans' }}</span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
            </section>
