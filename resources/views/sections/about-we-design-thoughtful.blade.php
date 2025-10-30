@php
$data = $block['data'] ?? [];
@endphp
            <section class="section-xl">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-6">
							<div class="about-one-leftbox" style="background-image: url('{{ image($data['background_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-1/about-mask-img.jpg', 'section_background') }}')">
								<div class="ihbox-style-area">
									<div class="pbmit-ihbox-style-12">
										<div class="pbmit-ihbox-headingicon">
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
													<i class="pbmit-xinterio-icon {{ $data['left_icon'] ?? 'pbmit-xinterio-icon-award' }}"></i>
												</div>
											</div>
											<div class="pbmit-ihbox-contents">
												<h2 class="pbmit-element-title">{!! $data['left_title'] ?? 'Award-Winning <br>Excellence' !!}</h2>
											</div>
											<div class="pbmit-sticky-corner  pbmit-bottom-left-corner">
												<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
													<path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
												</svg>
											</div>
											<div class="pbmit-sticky-corner pbmit-top-right-corner">
												<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
													<path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="about-one-rightbox">
								<div class="pbmit-heading-subheading animation-style2">
									@if(isset($data['subtitle']) && $data['subtitle'])
									<h4 class="pbmit-subtitle">{{ $data['subtitle'] }}</h4>
									@endif
									<h2 class="pbmit-title">{{ $data['title'] ?? 'We architect premium, executive-caliber environments.' }}</h2>
									@if(isset($data['description']) && $data['description'])
									<div class="pbmit-heading-desc">
										{{ $data['description'] }}
									</div>
									@endif
								</div>
								<div class="row g-3">
									@if(isset($data['icon_boxes']) && is_array($data['icon_boxes']) && count($data['icon_boxes']) > 0)
										@foreach($data['icon_boxes'] as $box)
										<div class="col-md-6">
											<article class="pbmit-miconheading-style-9">
												<div class="pbmit-ihbox-style-9">
													<div class="pbmit-ihbox-box d-flex align-items-center">
														<div class="pbmit-ihbox-icon">
															<div class="pbmit-ihbox-icon-wrapper">
																<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
																	<i class="pbmit-xinterio-icon {{ $box['icon'] ?? 'pbmit-xinterio-icon-tools' }}"></i>
																</div>
															</div>
														</div>
														<div class="pbmit-ihbox-contents">
															<h2 class="pbmit-element-title">
																{{ $box['title'] ?? 'Item ' . $loop->iteration }}
															</h2>
														</div>
													</div>
												</div>
											</article>
										</div>
										@endforeach
									@endif
								</div>
								@if((isset($data['signature_name']) && $data['signature_name']) || (isset($data['signature_image']) && $data['signature_image']))
								<div class="pbmit-ihbox pbmit-ihbox-style-5 pt-5">
									<div class="pbmit-ihbox-box d-flex align-items-center">
										<div class="pbmit-content-wrapper">
											@if(isset($data['signature_name']) && $data['signature_name'])
											<h2 class="pbmit-element-title">{{ $data['signature_name'] }}</h2>
											@endif
											@if(isset($data['signature_position']) && $data['signature_position'])
											<div class="pbmit-heading-desc">{{ $data['signature_position'] }}</div>
											@endif
										</div>
										@if(isset($data['signature_image']) && $data['signature_image'])
										<div class="pbmit-icon-wrapper">
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
													<img src="{{ image($data['signature_image'], 'section_image') }}" alt="{{ $data['signature_name'] ?? 'Signature' }}">
												</div>
											</div>
										</div>
										@endif
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
            </section>
