@php
    $data = $block['data'] ?? $block;
    $subtitle = $data['subtitle'] ?? 'Membership Plans';
    $title = $data['title'] ?? 'Premium workspace for visionary leaders!';
    $description = $data['description'] ?? 'We meticulously curate every executive workspace, so you can rest assured that your business would experience the absolute highest caliber of professional environment.';
    $backgroundImage = $data['background_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/pattern-bg-03.png';
    $plans = $data['plans'] ?? [];
@endphp
<section class="pbmit-sticky-section pricing-five-bg pbminfotech-ele-ptable-style-2" style="background-image: url('{{ image($backgroundImage, 'section_background') }}')">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-xl-4">
							<div class="pbmit-sticky-col">
								<div class="pricing-five-head-area">
									<div class="pbmit-heading-subheading animation-style4">
										<h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
										<h2 class="pbmit-title">{{ $title }}</h2>
										<div class="pbmit-heading-desc">
											{{ $description }}
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-8">
							<div class="pricing-five-area">
								<div class="row">
@foreach($plans as $plan)
									<div class="{{ ($plan['featured'] ?? false) ? 'pbmit-pricing-table-featured-col ' : '' }}pbmit-ptable-col col-md-12">
										<div class="pbmit-pricing-table-box">
											<div class="pbmit-head-wrap">
												<h3 class="pbminfotech-ptable-heading">{{ $plan['name'] }}</h3>
												<div class="pbminfotech-sep"></div>
												<div class="pbmit-price-wrapper">
													<div class="pbmit-ptable-price-w">
														<div class="pbminfotech-ptable-symbol">{{ $plan['currency'] }}</div>
														<div class="pbminfotech-ptable-price">{{ $plan['price'] }}</div>
													</div>
													<div class="pbminfotech-ptable-frequency">{{ $plan['period'] }}</div>
												</div>
											</div>
											<div class="pbmit-ptable-inner">
												<div class="pbmit-ptable-lines-w">
@foreach($plan['features'] as $feature)
													<div class="pbmit-ptable-line">
@if($feature['has_icon'] ?? false)
														<i class="fa ti-check"></i>{{ $feature['text'] }}
@else
														{{ $feature['text'] }}
@endif
													</div>
@endforeach
												</div>
												<div class="pbminfotech-ptable-btn">
													<div class="pbmit-button">
														<a class="pbmit-button-inner" href="#">
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
