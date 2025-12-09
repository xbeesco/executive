@php
    $data = $block['data'] ?? [];
@endphp
			<section>
				<div class="container-fluid p-0">
					<div class="row g-2">
						<div class="col-md-12 col-xl-6">
							<div class="before-after-left-area pbmit-bg-color-blackish">
								<div class="pbmit-heading-subheading animation-style4">
									@if(!empty($data['subtitle']))
										<h4 class="pbmit-subtitle">{{ $data['subtitle'] }}</h4>
									@endif
									<h2 class="pbmit-title">{{ $data['title'] }}</h2>
									@if(!empty($data['description']))
										<div class="pbmit-heading-desc">
											{{ $data['description'] }}
										</div>
									@endif
								</div>
								@if(!empty($data['statistics']) && count($data['statistics']) > 0)
									<div class="row pbmit-fid-style-one">
										@foreach($data['statistics'] as $stat)
											<div class="col-md-6">
												<div class="pbminfotech-ele-fid-style-1">
													<div class="pbmit-fld-contents d-flex align-items-center">
														<div class="pbmit-circle-outer"
															data-digit="{{ $stat['percentage'] }}"
															data-fill="{{ $stat['color'] }}"
															data-emptyfill=""
															data-before=""
															data-after="<span>%</span>"
															data-thickness="1"
															data-size="127">
															<div class="pbmit-circle">
																<div class="pbmit-fid-inner">
																	<span class="pbmit-fid-before"></span>
																	<span class="pbmit-number-rotate numinate"
																		data-appear-animation="animateDigits"
																		data-from="0"
																		data-to="{{ $stat['percentage'] }}"
																		data-interval="5"
																		data-before=""
																		data-before-style=""
																		data-after=""
																		data-after-style="">{{ $stat['percentage'] }}</span>
																	<span class="pbmit-fid"><span>%</span></span>
																</div>
															</div>
														</div>
														<div class="pbmit-fid-sub">
															<h3 class="pbmit-fid-title">{!! $stat['title'] !!}</h3>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								@endif
							</div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="twentytwenty-container">
								<img src="{{ image($data['after_image'], 'section_image') }}" alt="After">
								<img src="{{ image($data['before_image'], 'section_image') }}" alt="Before">
							</div>
						</div>
					</div>
				</div>
            </section>
