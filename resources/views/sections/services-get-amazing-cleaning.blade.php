@php
    $data = $block['data'] ?? $block;
    $subtitle = $data['subtitle'] ?? 'Premium Process';
    $title = $data['title'] ?? 'Experience luxury workspace in <br> 4 seamless steps';
    $backgroundImage = $data['background_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/bg/step-bg.png';
    $steps = $data['steps'] ?? [];
@endphp
            <section class="pbmit-element-static-box-style-2" style="background-image: url('{{ image($backgroundImage, 'section_background') }}')">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style2">
						<h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
						<h2 class="pbmit-title">{!! $title !!}</h2>
					</div>
					<div class="row">
						<div class="pbmit-main-static-slider d-flex align-items-center justify-content-between">
							<div class="swiper-static-slide-nav col-md-6">
								<ul class="pbmit-hover-inner">
@foreach($steps as $index => $step)
									<li class="pbmit-title-wrapper">
										<div class="pbmit-static-box-number">
											<div class="pbmit-box-number">{{ sprintf('%02d', $index + 1) }}</div>
										</div>
										<div class="pbmit-content-box">
											<div class="pbmit-static-box-title">
												<h5>{{ $step['title'] }}</h5>
											</div>
											<div class="pbmit-static-box-desc">{{ $step['description'] }}</div>
										</div>
									</li>
@endforeach
								</ul>
							</div>
							<div class="swiper-static-slide-images col-md-6">
								<div class="swiper-slider pbmit-static-image">
									<div class="swiper-wrapper">
@foreach($steps as $index => $step)
										<!-- Slide{{ $index + 1 }} -->
										<div class="swiper-slide">
											<img src="{{ image($step['image'], 'section_image') }}" class="img-fluid" alt="">
										</div>
@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>
