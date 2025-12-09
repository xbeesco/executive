@php
    $data = $block['data'] ?? $block;
    $subtitle = $data['subtitle'] ?? 'Why Choose Executive?';
    $title = $data['title'] ?? 'Crafting your workspace so inspiring, success becomes inevitable';
    $description = $data['description'] ?? "Since 2015, we've been delivering premium workspace solutions tailored for discerning business leaders who demand excellence.";
    $image = $data['image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/lamp.png';
    $features = $data['features'] ?? [];
@endphp
			<section class="pbmit-sticky-section">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-5">
							<div class="pbmit-sticky-col">
								<div class="ihbox-six-left-area">
									<div class="pbmit-heading-subheading animation-style4">
										<h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
										<h2 class="pbmit-title">{{ $title }}</h2>
										<div class="pbmit-heading-desc">{{ $description }}</div>
									</div>
									<div class="text-center">
										<img src="{{ image($image, 'section_image') }}" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-7">
							<div class="ihbox-six-right-area">
								<div class="row">
@foreach($features as $feature)
									<article class="pbmit-miconheading-style-19 col-md-6">
										<div class="pbmit-ihbox-style-19">
											<div class="pbmit-ihbox-box">
												<div class="pbmit-ihbox-icon">
													<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
														<i class="{{ $feature['icon'] }}"></i>
													</div>
												</div>
												<h2 class="pbmit-element-title">
													{{ $feature['title'] }}
												</h2>
												<div class="pbmit-heading-desc">{{ $feature['description'] }}</div>
											</div>
										</div>
									</article>
@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
