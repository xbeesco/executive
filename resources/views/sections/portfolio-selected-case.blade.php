@php
	// Group items into slides (2 items per slide)
	$slides = isset($block['data']['items']) ? array_chunk($block['data']['items'], 2) : [];
	$autoplay = $block['data']['autoplay'] ?? false;
	$columns = $block['data']['columns'] ?? '3';
@endphp

<section class="portfolio-section-eight pbmit-element-portfolio-style-6">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-md-3">
				<div class="pbmit-heading-subheading animation-style4">
					@if(!empty($block['data']['subtitle']))
						<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
					@endif
					@if(!empty($block['data']['title']))
						<h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
					@endif
				</div>
			</div>
			<div class="col-md-9">
				<div class="swiper-slider" data-autoplay="{{ $autoplay ? 'true' : 'false' }}" data-loop="true" data-dots="false" data-arrows="false" data-columns="{{ $columns }}" data-margin="30" data-effect="slide">
					<div class="swiper-wrapper">
						@foreach($slides as $slideIndex => $slideItems)
							<!-- Slide{{ $slideIndex + 1 }} -->
							<div class="swiper-slide">
								@foreach($slideItems as $itemIndex => $item)
									@php
										$imageNumber = str_pad(($slideIndex * 2) + $itemIndex + 1, 2, '0', STR_PAD_LEFT);
										$defaultImage = "https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/portfolio/portfolio-{$imageNumber}.jpg";
										$isEven = $itemIndex === 1;
									@endphp
									<article class="pbmit-portfolio-style-6{{ $isEven ? ' pbmit-even' : '' }}">
										<div class="pbminfotech-post-content">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="{{ image($item['image'] ?? $defaultImage, 'section_image') }}" class="img-fluid" alt="{{ $item['title'] ?? '' }}">
												</div>
											</div>
											<div class="pbminfotech-box-content">
												@if(!empty($item['category']))
												@php
													$categoryModel = \App\Models\Category::where('slug', $item['category'])->first();
												@endphp
												@if($categoryModel)
												<div class="pbmit-port-cat">
													<a href="#" rel="tag">{{ $categoryModel->name }}</a>
												</div>
												@endif
												@endif
												<h3 class="pbmit-portfolio-title">
													<a href="{{ $item['link'] ?? '#' }}">{{ $item['title'] ?? 'Portfolio Item' }}</a>
												</h3>
											</div>
											<a href="{{ $item['link'] ?? '#' }}" class="pbmit-link"></a>
										</div>
									</article>
								@endforeach
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
