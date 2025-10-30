            <section class="pbmit-sticky-section pricing-five-bg pbminfotech-ele-ptable-style-2" style="background-image: url('{{ image($block['data']['background_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/pattern-bg-03.png', 'section_background', $loop->iteration) }}')">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-xl-4">
							<div class="pbmit-sticky-col">
								<div class="pricing-five-head-area">
									<div class="pbmit-heading-subheading animation-style4">
										<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] ?? 'Membership Plans' }}</h4>
										<h2 class="pbmit-title">{{ $block['data']['title'] ?? 'Premium workspace for visionary leaders!' }}</h2>
										@if(!empty($block['data']['description']))
											<div class="pbmit-heading-desc">
												{{ $block['data']['description'] }}
											</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-8">
							<div class="pricing-five-area">
								<div class="row">
									@foreach($block['data']['plans'] ?? [] as $plan)
										<div class="@if($plan['featured'] ?? false) pbmit-pricing-table-featured-col @endif pbmit-ptable-col col-md-12">
											<div class="pbmit-pricing-table-box">
												<div class="pbmit-head-wrap">
													<h3 class="pbminfotech-ptable-heading">{{ $plan['name'] ?? '' }}</h3>
													<div class="pbminfotech-sep"></div>
													<div class="pbmit-price-wrapper">
														<div class="pbmit-ptable-price-w">
															<div class="pbminfotech-ptable-symbol">{{ $plan['currency'] ?? 'EGP' }}</div>
															<div class="pbminfotech-ptable-price">{{ $plan['price'] ?? '' }}</div>
														</div>
														<div class="pbminfotech-ptable-frequency">{{ $plan['period'] ?? '/mo' }}</div>
													</div>
												</div>
												<div class="pbmit-ptable-inner">
													<div class="pbmit-ptable-lines-w">
														@foreach($plan['features'] ?? [] as $feature)
															<div class="pbmit-ptable-line">
																@if($feature['has_icon'] ?? true)
																	<i class="fa ti-check"></i>
																@endif
																{{ $feature['text'] ?? '' }}
															</div>
														@endforeach
													</div>
													<div class="pbminfotech-ptable-btn">
														<div class="pbmit-button">
															<a class="pbmit-button-inner" href="{{ $plan['button_link'] ?? '#' }}">
																<span class="pbmit-button-wrapper">
																	<span class="pbmit-button-text">{{ $plan['button_text'] ?? 'Reserve Your Space' }}</span>
																</span>
															</a>
														</div>
													</div>
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
