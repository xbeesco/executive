@php
    $data = $block['data'] ?? $block;
    $subtitle = $data['subtitle'] ?? 'Excellence Redefined';
    $title = $data['title'] ?? 'Your Executive Journey';
    $steps = $data['steps'] ?? [];
@endphp
<section class="section-xl pbmit-element-static-box-style-1">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style2">
						<h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
						<h2 class="pbmit-title">{{ $title }}</h2>
					</div>
					<div class="pbmit-element-posts-wrapper row g-0">
@foreach($steps as $index => $step)
						<article class="pbmit-static-box-style-1">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-bg-imgbox" style="background-image: url('{{ image($step['image'], 'section_background') }}')">
									<div class="pbmit-img">
										<img src="{{ image($step['image'], 'section_image') }}" alt="">
									</div>
									<div class="pbmit-box-number">{{ sprintf('%02d', $index + 1) }}</div>
									<h4 class="pbmit-static-box-title">{{ $step['title'] }}</h4>
								</div>
								<div class="pbmit-content-box">
									<div class="pbmit-box-number">{{ sprintf('%02d', $index + 1) }}</div>
									<div class="pbmit-content-inner">
										<h4 class="pbmit-static-box-title">{{ $step['title'] }}</h4>
										<div class="pbmit-static-box-desc">{{ $step['description'] }}</div>
									</div>
									<div class="pbmit-static-btn">
										<a class="pbmit-button-inner" href="#">
											<span class="pbmit-button-wrapper">
												<span class="pbmit-button-text">Learn More</span>
											</span>
										</a>
									</div>
								</div>
								<a class="pbmit-link" href=""></a>
							</div>
						</article>
@endforeach
					</div>
				</div>
            </section>
