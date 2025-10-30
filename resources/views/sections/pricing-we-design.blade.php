@php
    $data = $block['data'] ?? [];
@endphp
            <section class="about-section-nine">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-3 pbmit-col1">
							<div class="about-nine-left-box">
								<div class="pbmit-heading-subheading animation-style4">
									@if(!empty($data['subtitle']))
									<h4 class="pbmit-subtitle">{{ $data['subtitle'] }}</h4>
									@endif
									<h2 class="pbmit-title">{{ $data['title'] ?? 'We craft sophisticated, executive spaces.' }}</h2>
									@if(!empty($data['description']))
									<div class="pbmit-heading-desc">
										{{ $data['description'] }}
									</div>
									@endif
								</div>
								@if(!empty($data['button_text']) || !empty($data['button_link']))
								<a class="pbmit-btn pbmit-btn-outline" href="{{ $data['button_link'] ?? '#' }}">
									<span class="pbmit-button-content-wrapper">
										<span class="pbmit-button-text">{{ $data['button_text'] ?? 'Discover More' }}</span>
									</span>
								</a>
								@endif
							</div>
						</div>
						<div class="col-md-6 pbmit-col2">
							<div class="d-flex justify-content-center">
								<div class="about-nine-img">
									<img src="{{ image($data['main_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/about-img.webp', 'section_image') }}" class="img-fluid" alt="">
								</div>
							</div>
						</div>
						<div class="col-md-3 pbmit-col3">
							<div class="about-nine-right-box">
								@if(!empty($data['services']))
									@foreach($data['services'] as $service)
								<article class="pbmit-miconheading-style-22">
									<div class="pbmit-ihbox-style-22">
										<div class="pbmit-ihbox-box d-flex">
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
													<i class="{{ $service['icon'] ?? 'pbmit-xinterio-icon pbmit-xinterio-icon-axis' }}"></i>
												</div>
											</div>
											<div class="pbmit-ihbox-contents">
												<h2 class="pbmit-element-title">
													{{ $service['title'] ?? 'Service Title' }}
												</h2>
												@if(!empty($service['description']))
												<div class="pbmit-heading-desc">{{ $service['description'] }}</div>
												@endif
											</div>
										</div>
									</div>
								</article>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
            </section>            
