@php
	$data = $block["data"] ?? $block;
@endphp
<section class="about-us-section-seven" style="background-image: url('{{ image($data['background_image'], 'section_background') }}')">
				<div class="container-fluid p-0">
					<div class="row g-0">
						<div class="col-md-12 col-xl-4">
							<div class="about-us-left-box pbmit-bg-color-global">
								<div class="pbmit-heading-subheading animation-style4">
									<h2 class="pbmit-title">{!! $data['left_title'] !!}</h2>
									<div class="pbmit-heading-desc">{{ $data['left_description'] }}</div>
								</div>
								<div class="w-100 mb-md-0 mb-3">
									<div class="pbmit-shape-square">
										<i aria-hidden="true" class="{{ $data['left_icon'] }}"></i>
									</div>
								</div>
								<div class="pbmit-btn-style-text">
									<div class="pbmit-btn-wrap">
										<a class="pbmit-btn" href="{{ $data['left_button_link'] }}">
											<span class="pbmit-button-content-wrapper">
												<span class="pbmit-button-text">{{ $data['left_button_text'] }}</span>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="about-us-center-box pbmit-bg-color-blackish">
								<div class="pbmit-heading-subheading animation-style4">
									<h2 class="pbmit-title">{!! $data['center_title'] !!}</h2>
									<div class="pbmit-heading-desc">{{ $data['center_description'] }}</div>
								</div>
								<ul class="list-group list-group-borderless">
									@foreach(($data['center_features'] ?? [
										['icon' => 'ti-check', 'text' => 'Dedicated executive concierge team'],
										['icon' => 'ti-check', 'text' => '24/7 premium workspace accessibility'],
										['icon' => 'ti-check', 'text' => 'Flexible membership across global locations']
									]) as $feature)
									<li class="list-group-item">
										<span class="pbmit-icon-list-icon">
											<i aria-hidden="true" class="{{ $feature['icon'] }}"></i>
										</span>
										<span class="pbmit-icon-list-text">{{ $feature['text'] ?? '' }}</span>
									</li>
									@endforeach
								</ul>
								<div class="pbmit-btn-style-text">
									<div class="pbmit-btn-wrap">
										<a class="pbmit-btn" href="{{ $data['center_button_link'] }}">
											<span class="pbmit-button-content-wrapper">
												<span class="pbmit-button-text">{{ $data['center_button_text'] }}</span>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="about-us-right-box pbmit-bg-color-light-3">
								<div class="pbmit-heading-subheading animation-style4">
									<h2 class="pbmit-title">{!! $data['right_title'] !!}</h2>
									<div class="pbmit-heading-desc">{{ $data['right_description'] }}</div>
								</div>
								<div class="w-100 mb-md-0 mb-3">
									<div class="pbmit-shape-square">
										<i aria-hidden="true" class="{{ $data['right_icon'] }}"></i>
									</div>
								</div>
								<div class="pbmit-btn-style-text">
									<div class="pbmit-btn-wrap">
										<a class="pbmit-btn" href="{{ $data['right_button_link'] }}">
											<span class="pbmit-button-content-wrapper">
												<span class="pbmit-button-text">{{ $data['right_button_text'] }}</span>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>