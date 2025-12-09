            <section class="section-md">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-5 width-100-tablet">
							<div class="about-seven-left-box">
								<div class="text-start">
									<img src="{{ image($block['data']['main_image'], 'section_image') }}" class="img-fluid first-img" alt="">
								</div>
								<div class="about-img-second">
									<div class="about-img-wrap">
										<img src="{{ image($block['data']['second_image'], 'section_image') }}" class="img-fluid" alt="">
									</div>
								</div>
								@if(!empty($block['data']['stat_number']) || !empty($block['data']['stat_title']))
								<div class="fid-style-area">
									<div class="pbminfotech-ele-fid-style-7">
										<div class="pbmit-fld-contents">
											<div class="pbmit-fld-wrap">
												<h4 class="pbmit-fid-inner">
													<span class="pbmit-fid-before"></span>
													<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $block['data']['stat_number'] }}" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">{{ $block['data']['stat_number'] }}</span>
													@if(!empty($block['data']['stat_suffix']))
													<span class="pbmit-fid"><span>{{ $block['data']['stat_suffix'] }}</span></span>
													@endif
												</h4>
												<h3 class="pbmit-fid-title">{!! str_replace("\n", " <br>", $block['data']['stat_title']) !!}</h3>
											</div>
										</div>
									</div>
								</div>
								@endif
							</div>
						</div>
						<div class="col-md-7 width-100-tablet">
							<div class="about-seven-right-box">
								<div class="pbmit-heading-subheading animation-style4">
									@if(!empty($block['data']['subtitle']))
									<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
									@endif
									<h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
									@if(!empty($block['data']['description']))
									<div class="pbmit-heading-desc">
										{{ $block['data']['description'] }}
									</div>
									@endif
								</div>
								@if(!empty($block['data']['numbered_features']) && count($block['data']['numbered_features']) > 0)
								<div class="pbmit-ihbox-style-1-new">
									<div class="row">
										@foreach($block['data']['numbered_features'] as $feature)
										<article class="pbmit-miconheading-style-1 col-md-12">
											<div class="pbmit-ihbox-style-1">
												<div class="pbmit-ihbox-headingicon d-flex align-items-center">
													@if(!empty($feature['number']))
													<div class="pbmit-ihbox-icon">
														<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-text">{{ $feature['number'] }}</div>
													</div>
													@endif
													<div class="pbmit-ihbox-contents">
														<h2 class="pbmit-element-title">
															{{ $feature['title'] ?? '' }}
														</h2>
													</div>
												</div>
											</div>
										</article>
										@endforeach
									</div>
								</div>
								@endif
								@if(!empty($block['data']['icon_boxes']) && count($block['data']['icon_boxes']) > 0)
								<div class="mt-2 mb-5">
									<div class="row">
										@foreach($block['data']['icon_boxes'] as $index => $iconBox)
										<div class="col-md-{{ $index === 0 ? '5' : '7' }}{{ $index > 0 ? ' ps-xl-5' : '' }}">
											<div class="pbmit-ihbox-style-{{ $index === 0 ? '23' : '24' }}{{ $index > 0 ? ' pt-md-0 pt-3' : '' }}">
												@if($index === 0)
												<div class="pbmit-ihbox-box">
													@if(!empty($iconBox['icon_image']))
													<div class="pbmit-ihbox-icon">
														<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
															<img src="{{ image($iconBox['icon_image'], 'section_image') }}" class="img-fluid" alt="{{ $iconBox['title'] ?? '' }}">
														</div>
													</div>
													@endif
													<div class="pbmit-content-wrapper">
														<h2 class="pbmit-element-title">{{ $iconBox['title'] ?? '' }}</h2>
													</div>
												</div>
												@else
												<div class="pbmit-ihbox-headingicon">
													@if(!empty($iconBox['icon_image']))
													<div class="pbmit-ihbox-icon">
														<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
															<img src="{{ image($iconBox['icon_image'], 'section_image') }}" class="img-fluid" alt="{{ $iconBox['title'] ?? '' }}">
														</div>
													</div>
													@endif
													<div class="pbmit-ihbox-contents">
														<h2 class="pbmit-element-title">{{ $iconBox['title'] ?? '' }}</h2>
													</div>
												</div>
												@endif
											</div>
										</div>
										@if($index === 0 && count($block['data']['icon_boxes']) === 1)
										@break
										@endif
										@if($index === 1)
										@break
										@endif
										@endforeach
									</div>
								</div>
								@endif
								@if(!empty($block['data']['button_text']))
								<a class="pbmit-btn pbmit-btn-outline" href="{{ $block['data']['button_link'] }}">
									<span class="pbmit-button-content-wrapper">
										<span class="pbmit-button-text">{{ $block['data']['button_text'] }}</span>
									</span>
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>
            </section>
