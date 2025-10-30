			<section class="section-xl tab-sec-one">
				<div class="container">
					@if($block['data']['subtitle'] ?? $block['data']['title'] ?? null)
					<div class="pbmit-heading-subheading text-center animation-style2">
						@if($block['data']['subtitle'] ?? null)
						<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
						@endif
						@if($block['data']['title'] ?? null)
						<h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
						@endif
					</div>
					@endif
					@if(!empty($block['data']['tabs']))
					<div class="pbmit-tab">
						<ul class="nav nav-tabs" role="tablist">
							@foreach($block['data']['tabs'] as $index => $tab)
							<li class="nav-item" role="presentation">
								<a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#tab-2-{{ $loop->iteration }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" role="tab" @if(!$loop->first) tabindex="-1" @endif>
									<span>{{ $tab['label'] ?? 'Tab ' . $loop->iteration }}</span>
									@if($tab['icon'] ?? null)
									<i class="{{ $tab['icon'] }}"></i>
									@else
									<i class="pbmit-base-icon-pbmit-up-arrow"></i>
									@endif
								</a>
							</li>
							@endforeach
						</ul>
						<div class="tab-content">
							@foreach($block['data']['tabs'] as $index => $tab)
							<div class="tab-pane {{ $loop->first ? 'show active' : '' }}" id="tab-2-{{ $loop->iteration }}" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0 align-items-center">
										<div class="col-xl-5 col-md-12 pbmit-tab-img">
											@php
												$fallbackImage = 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/tab-img' . $loop->iteration . '.jpg';
											@endphp
											<img src="{{ image($tab['image'] ?? $fallbackImage, 'section_image') }}" class="img-fluid" alt="{{ $tab['label'] ?? '' }}">
										</div>
										<div class="col-xl-7 col-md-12 pbmit-tab-list">
											@if($tab['content_title'] ?? null)
											<h2>{{ $tab['content_title'] }}</h2>
											@endif
											@if($tab['description'] ?? null)
											{{ $tab['description'] }}
											@endif
											@if(!empty($tab['features']))
											<ul class="list-group list-group-borderless">
												@foreach($tab['features'] as $feature)
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														@if($feature['icon'] ?? null)
														<i aria-hidden="true" class="pbmit-xinterio-icon {{ $feature['icon'] }}"></i>
														@else
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
														@endif
													</span>
													<span class="pbmit-icon-list-text">{{ $feature['text'] ?? '' }}</span>
												</li>
												@endforeach
											</ul>
											@endif
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
				</div>
			</section> 
