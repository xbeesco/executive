@php
    $data = $block['data'] ?? $block;
    $subtitle = $data['subtitle'] ?? 'Membership Plans';
    $title = $data['title'] ?? 'Choose plan for your business';
    $backgroundImage = $data['background_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/bg/pattern-bg-02.png';
    $benefits = $data['benefits'] ?? [];
    $plans = $data['plans'] ?? [];
@endphp
<section class="section-xl pricing-six-bg" style="background-image: url('{{ image($backgroundImage, 'section_background') }}')">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-7 pbmit-pricing-style-1-new">
							<div class="pbminfotech-ele-ptable-style-1">
								<div class="pbmit-ptable-cols row">
@foreach($plans as $plan)
									<div class="{{ ($plan['featured'] ?? false) ? 'pbmit-pricing-table-featured-col ' : '' }}pbmit-ptable-col col-md-6">
										<div class="pbmit-pricing-table-box">
											<div class="pbmit-head-wrap">
												<h3 class="pbminfotech-ptable-heading">{{ $plan['name'] ?? '' }}</h3>
												<div class="pbminfotech-sep"></div>
												<div class="pbmit-price-wrapper">
													<div class="pbmit-ptable-price-w">
														<div class="pbminfotech-ptable-symbol">{{ $plan['currency'] ?? $data['currency'] ?? 'EGP' }}</div>
														<div class="pbminfotech-ptable-price">{{ $plan['price'] ?? '' }}</div>
													</div>
													<div class="pbminfotech-ptable-frequency">{{ $plan['period'] ?? '' }}</div>
												</div>
											</div>
											<div class="pbmit-ptable-inner">
												<div class="pbmit-ptable-lines-w">
@foreach($plan['features'] ?? [] as $feature)
													<div class="pbmit-ptable-line">{{ is_array($feature) ? ($feature['text'] ?? '') : $feature }}</div>
@endforeach
												</div>
												<div class="pbminfotech-ptable-btn">
													<div class="pbmit-button">
														<a class="pbmit-button-inner" href="about-mask-img">
															<span class="pbmit-button-wrapper">
																<span class="pbmit-button-text">{{ $plan['button_text'] ?? 'Join Now' }}</span>
															</span>
														</a>
													</div>
												</div>
											</div>
											<div class="pbmit-feature-wrap">
@if($plan['featured'] ?? false)
												<div class="pbmit-ptablebox-featured-w"></div>
@endif
											</div>
										</div>
									</div>
@endforeach
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-5">
							<div class="pricing-six-rightbox">
								<div class="pbmit-heading-subheading animation-style2">
									<h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
									<h2 class="pbmit-title">{{ $title }}</h2>
								</div>
								<ul class="list-group list-group-borderless">
@foreach($benefits as $benefit)
									<li class="list-group-item">
										<span class="pbmit-icon-list-icon">
											<i aria-hidden="true" class="{{ icon_class($benefit['icon']) }}"></i>
										</span>
										<span class="pbmit-icon-list-text">{{ $benefit['text'] }}</span>
									</li>
@endforeach
								</ul>
								<div class="pbmit-btn-style-text">
									<a class="pbmit-btn" href="our-history.html">
										<span class="pbmit-button-content-wrapper">
											<span class="pbmit-button-text">View All Plans</span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>
