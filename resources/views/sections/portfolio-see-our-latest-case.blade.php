			<section class="section-xl pbmit-sortable-yes">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-xl-7">
							<div class="pbmit-heading-subheading">
								<h2 class="pbmit-title">{{ $data['title'] ?? 'Explore our executive projects' }}</h2>
							</div>
							@if(($data['enable_sorting'] ?? true) && !empty($data['categories']))
							@php
								$categories = \App\Models\Category::whereIn('slug', $data['categories'])->get();
							@endphp
							<div class="pbmit-sortable-list pbmit-sortable-list-style-2">
								<ul class="pbmit-sortable-list-ul">
									<li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
									@foreach($categories as $category)
									<li><a href="#" class="pbmit-sortable-link" data-sortby="{{ $category->slug }}">{{ $category->name }}</a></li>
									@endforeach
								</ul>
							</div>
							@endif
						</div>
						<div class="col-md-5">
							<div class="pbminfotech-ele-fid-style-5 d-xl-block d-none">
								<div class="pbmit-fld-contents">
									<div class="pbmit-fld-wrap">
										<h4 class="pbmit-fid-inner">
											<span class="pbmit-fid-before"></span>
											<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $data['stat_number'] ?? '460' }}" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">{{ $data['stat_number'] ?? '460' }}</span>
											@if(!empty($data['stat_suffix']))
											<span class="pbmit-fid"><span>{{ $data['stat_suffix'] }}</span></span>
											@endif
										</h4>
										<span class="pbmit-fid-title">{!! nl2br(e($data['stat_description'] ?? 'Executive Workspace Solutions delivered for elite clients')) !!}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="pbmit-element-posts-wrapper row g-2 pbmit-portfolio-style-3-new">
						@foreach($data['items'] ?? [] as $item)
						<article class="pbmit-portfolio-style-3 {{ $item['category'] ?? '' }} col-md-6 col-lg-3">
							<div class="pbminfotech-post-content">
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<img src="{{ image($item['image'] ?? '', 'section_image', 'portfolio-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '.jpg') }}" class="img-fluid" alt="{{ $item['title'] ?? 'portfolio-' . $loop->iteration }}">
									</div>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
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
											<a href="{{ $item['link'] ?? '#' }}">{{ $item['title'] ?? 'Project ' . $loop->iteration }}</a>
										</h3>
									</div>
								</div>
								<div class="pbmit-portfolio-btn">
									<a href="{{ $item['link'] ?? '#' }}">
										<i class="pbmit-base-icon-pbmit-up-arrow"></i>
									</a>
								</div>
								<a class="pbmit-link" href="{{ $item['link'] ?? '#' }}"></a>
							</div>
						</article>
						@endforeach
					</div>
				</div>
			</section>
