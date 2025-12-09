@php
    $data = $block['data'] ?? $block;
    $title = $data['title'] ?? 'Explore our executive projects';
    $statNumber = $data['stat_number'] ?? '460';
    $statSuffix = $data['stat_suffix'] ?? '+';
    $statText = $data['stat_text'] ?? 'Executive Workspace Solutions <br> delivered for elite clients';
    $categories = $data['categories'] ?? [];
    $items = $data['items'] ?? [];
@endphp
			<section class="section-xl pbmit-sortable-yes">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-xl-7">
							<div class="pbmit-heading-subheading">
								<h2 class="pbmit-title">{{ $title }}</h2>
							</div>
							<div class="pbmit-sortable-list pbmit-sortable-list-style-2">
								<ul class="pbmit-sortable-list-ul">
									<li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
@foreach($categories as $category)
									<li><a href="#" class="pbmit-sortable-link" data-sortby="{{ $category['filter'] ?? '' }}">{{ $category['name'] }}</a></li>
@endforeach
								</ul>
							</div>
						</div>
						<div class="col-md-5">
							<div class="pbminfotech-ele-fid-style-5 d-xl-block d-none">
								<div class="pbmit-fld-contents">
									<div class="pbmit-fld-wrap">
										<h4 class="pbmit-fid-inner">
											<span class="pbmit-fid-before"></span>
											<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $statNumber }}" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">{{ $statNumber }}</span>
											<span class="pbmit-fid"><span>{{ $statSuffix }}</span></span>
										</h4>
										<span class="pbmit-fid-title">{!! $statText !!}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="pbmit-element-posts-wrapper row g-2 pbmit-portfolio-style-3-new">
@foreach($items as $item)
						<article class="pbmit-portfolio-style-3 {{ $item['filter'] ?? '' }} col-md-6 col-lg-3">
							<div class="pbminfotech-post-content">
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{ image($item['image'], 'section_image') }}" class="img-fluid" alt="{{ $item['alt'] ?? 'portfolio' }}">
									</div>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
										<div class="pbmit-port-cat">
											<a href="portfolio-grid-col-3.html" rel="tag">{{ $item['category'] ?? '' }}</a>
										</div>
										<h3 class="pbmit-portfolio-title">
											<a href="portfolio-detail-style-1.html">{{ $item['title'] ?? '' }}</a>
										</h3>
									</div>
								</div>
								<div class="pbmit-portfolio-btn">
									<a href="portfolio-detail-style-1.html">
										<i class="pbmit-base-icon-pbmit-up-arrow"></i>
									</a>
								</div>
								<a class="pbmit-link" href="portfolio-detail-style-1.html"></a>
							</div>
						</article>
@endforeach
					</div>
				</div>
			</section>
