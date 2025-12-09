			<section class="section-lgt client-sec-eight">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-8 pbmit-client-style-1-new">
							<div class="client-style-area">
								<div class="row">
									@foreach($block['data']['clients'] ?? [] as $client)
									<article class="pbmit-client-style-1 col-md-6 col-lg-3">
										<div class="pbmit-border-wrapper">
											@if(!empty($client['url']))
											<a href="{{ $client['url'] }}" target="_blank" rel="noopener" class="pbmit-client-wrapper pbmit-client-with-hover-img">
											@else
											<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
											@endif
												<h4 class="pbmit-hide">{{ $client['name'] }}</h4>
												<div class="pbmit-client-hover-img">
													<img src="{{ image($client['logo_color'] . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '.png', 'section_image') }}" class="img-fluid" alt>
												</div>
												<div class="pbmit-featured-img-wrapper">
													<div class="pbmit-featured-wrapper">
														<img src="{{ image($client['logo_grey'] . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '.png', 'section_image') }}" class="img-fluid" alt>
													</div>
												</div>
											@if(!empty($client['url']))
											</a>
											@else
											</div>
											@endif
										</div>
									</article>
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="fid-style-area pbmit-fid-style-6-new">
								<div class="pbminfotech-ele-fid-style-6">
									<div class="pbmit-fld-contents">
										<div class="pbmit-fld-wrap">
											<h4 class="pbmit-fid-inner">
												<span class="pbmit-fid-before"></span>
												<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $block['data']['counter_number'] }}" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">{{ $block['data']['counter_number'] }}</span>
												<span class="pbmit-fid"><span>{{ $block['data']['counter_suffix'] }}</span></span>
											</h4>
											<span class="pbmit-fid-title">{{ $block['data']['counter_text'] }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
