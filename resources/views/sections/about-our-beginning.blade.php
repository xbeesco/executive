			<section class="section-xl pbmit-element-timeline-style-1">
				<div class="container-fluid p-0">
					<div class="pbmit-timeline">
						<div class="swiper-slider" data-autoplay="false" data-loop="false" data-dots="false" data-arrows="false" data-columns="4" data-margin="30" data-effect="slide">
							<div class="swiper-wrapper">
								@foreach($block['data']['events'] ?? [] as $event)
								<!-- Slide{{ $loop->iteration }} -->
								<div class="pbmit-timeline-wrapper swiper-slide{{ $loop->iteration % 2 == 1 ? ' pbmit-slide-even' : '' }}">
									<div class="pbmit-same-height steps-media pbmit-feature-image">
									   	<img src="{{ image($event['image'], 'time-line-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '.jpg') }}" class="img-fluid" alt="">
									</div>
									<div class="steps-dot">
										<i class="steps-dot-line"></i>
										<span class="dot"></span>
									</div>
									<div class="pbmit-same-height steps-content_wrap">
										<p class="pbmit-timeline-year">{{ $event['year'] ?? '' }}</p>
										<h3 class="pbmit-timeline-title">{{ $event['title'] ?? '' }}</h3>
										<p class="pbmit-timeline-desc">{{ $event['description'] ?? '' }}</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
