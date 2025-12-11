@php
    $data = $block['data'] ?? $block;
    $subtitle = $data['subtitle'] ?? 'Welcome to Executive Excellence';
    $title = $data['title'] ?? 'We craft sophisticated, executive spaces.';
    $description = $data['description'] ?? 'We carefully curate all workspace environments, so you can rest assured that your business would receive the absolute highest quality of executive service. Premium amenities combined with professional excellence for discerning leaders.';
    $buttonText = $data['button_text'] ?? 'Discover More';
    $buttonLink = $data['button_link'] ?? 'contact-us.html';
    $image = $data['image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/about-img.webp';
    $features = $data['features'] ?? [];
@endphp
            <section class="about-section-nine">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-3 pbmit-col1">
							<div class="about-nine-left-box">
								<div class="pbmit-heading-subheading animation-style4">
									<h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
									<h2 class="pbmit-title">{{ $title }}</h2>
									<div class="pbmit-heading-desc">
										{{ $description }}
									</div>
								</div>
								<a class="pbmit-btn pbmit-btn-outline" href="{{ $buttonLink }}">
									<span class="pbmit-button-content-wrapper">
										<span class="pbmit-button-text">{{ $buttonText }}</span>
									</span>
								</a>
							</div>
						</div>
						<div class="col-md-6 pbmit-col2">
							<div class="d-flex justify-content-center">
								<div class="about-nine-img">
									<img src="{{ image($image, 'section_image') }}" class="img-fluid" alt="">
								</div>
							</div>
						</div>
						<div class="col-md-3 pbmit-col3">
							<div class="about-nine-right-box">
@foreach($features as $feature)
								<article class="pbmit-miconheading-style-22">
									<div class="pbmit-ihbox-style-22">
										<div class="pbmit-ihbox-box d-flex">
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
													<i class="{{ icon_class($feature['icon']) }}"></i>
												</div>
											</div>
											<div class="pbmit-ihbox-contents">
												<h2 class="pbmit-element-title">
													{{ $feature['title'] }}
												</h2>
												<div class="pbmit-heading-desc">{{ $feature['description'] }}</div>
											</div>
										</div>
									</div>
								</article>
@endforeach
							</div>
						</div>
					</div>
				</div>
            </section>
