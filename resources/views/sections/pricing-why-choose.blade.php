@php
    $data = $block['data'] ?? $block;
    $title = $data['title'] ?? 'Why Choose Executive Workspace?';
    $tabs = $data['tabs'] ?? [];
@endphp
            <section class="">
				<div class="container">
					<div class="pbmit-heading text-center animation-style4">
						<h2 class="pbmit-title">{{ $title }}</h2>
					</div>
					<div class="pbmit-tab style-2">
						<ul class="nav nav-tabs" role="tablist">
@foreach($tabs as $index => $tab)
							<li class="nav-item" role="presentation">
								<a class="nav-link{{ $index === 0 ? ' active' : '' }}" data-bs-toggle="tab" href="#tab-2-{{ $index + 1 }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}" role="tab"{!! $index > 0 ? ' tabindex="-1"' : '' !!}>
									<span>{{ $tab['tab_title'] ?? '' }}</span>
								</a>
							</li>
@endforeach
						</ul>
						<div class="tab-content">
@foreach($tabs as $index => $tab)
							<div class="tab-pane{{ $index === 0 ? ' show active' : '' }}" id="tab-2-{{ $index + 1 }}" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0">
										<div class="col-xl-7 col-md-12 pbmit-tab-inner-content">
											<div class="pbmit-tab-heading">
												<h3>{{ $tab['content_title'] ?? '' }}</h3>
											</div>
											<div class="pbmit-tab-desc">{{ $tab['description'] ?? '' }}</div>
											<div class="pbmit-tab-highlight">
												<h3><span>{{ $tab['highlight_number'] ?? '' }}</span> {{ $tab['highlight_text'] ?? '' }}</h3>
											</div>
											<ul class="list-group list-group-borderless">
@foreach($tab['features'] ?? [] as $feature)
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
													<span class="pbmit-icon-list-text">{{ $feature }}</span>
												</li>
@endforeach
											</ul>
											<a class="pbmit-btn pbmit-btn-outline" href="{{ $tab['button_link'] ?? 'service-details.html' }}">
												<span class="pbmit-button-content-wrapper">
													<span class="pbmit-button-text">{{ $tab['button_text'] ?? 'Our Services' }}</span>
												</span>
											</a>
										</div>
										<div class="col-xl-5 col-md-12 pbmit-tab-image-wrap">
											<img src="{{ image($tab['image'], 'section_image') }}" class="img-fluid" alt="">
										</div>
									</div>
								</div>
							</div>
@endforeach
						</div>
					</div>
				</div>
            </section>
