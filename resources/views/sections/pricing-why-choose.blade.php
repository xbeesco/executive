@php
    $data = $block['data'] ?? [];
@endphp
            <section class="">
				<div class="container">
					<div class="pbmit-heading text-center animation-style4">
						<h2 class="pbmit-title">{{ $data['title'] ?? 'Why Choose Executive Workspace?' }}</h2>
					</div>
					<div class="pbmit-tab style-2">
						<ul class="nav nav-tabs" role="tablist">
							@foreach($data['tabs'] ?? [] as $index => $tab)
							<li class="nav-item" role="presentation">
								<a class="nav-link {{ $index === 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#tab-2-{{ $index + 1 }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}" role="tab" {{ $index > 0 ? 'tabindex="-1"' : '' }}>
									<span>{{ $tab['tab_label'] ?? 'Tab ' . ($index + 1) }}</span>
								</a>
							</li>
							@endforeach
						</ul>
						<div class="tab-content">
							@foreach($data['tabs'] ?? [] as $index => $tab)
							<div class="tab-pane {{ $index === 0 ? 'show active' : '' }}" id="tab-2-{{ $index + 1 }}" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0">
										<div class="col-xl-7 col-md-12 pbmit-tab-inner-content">
											<div class="pbmit-tab-heading">
												<h3>{{ $tab['heading'] ?? '' }}</h3>
											</div>
											<div class="pbmit-tab-desc">{{ $tab['description'] ?? '' }}</div>
											@if(!empty($tab['highlight_number']) || !empty($tab['highlight_text']))
											<div class="pbmit-tab-highlight">
												<h3>
													@if(!empty($tab['highlight_number']))
													<span>{{ $tab['highlight_number'] }}{{ $tab['highlight_suffix'] ?? '' }}</span>
													@endif
													{{ $tab['highlight_text'] ?? '' }}
												</h3>
											</div>
											@endif
											@if(!empty($tab['list_items']))
											<ul class="list-group list-group-borderless">
												@foreach($tab['list_items'] as $item)
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="{{ $item['icon'] ?? 'ti-check' }}"></i>
													</span>
													<span class="pbmit-icon-list-text">{{ $item['text'] ?? '' }}</span>
												</li>
												@endforeach
											</ul>
											@endif
											@if(!empty($tab['button_text']))
											<a class="pbmit-btn pbmit-btn-outline" href="{{ $tab['button_link'] ?? '#' }}">
												<span class="pbmit-button-content-wrapper">
													<span class="pbmit-button-text">{{ $tab['button_text'] }}</span>
												</span>
											</a>
											@endif
										</div>
										<div class="col-xl-5 col-md-12 pbmit-tab-image-wrap">
											<img src="{{ image($tab['image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/tab-img/tab-img-' . str_pad($index + 1, 2, '0', STR_PAD_LEFT) . '.jpg', 'section_image') }}" class="img-fluid" alt="{{ $tab['tab_label'] ?? '' }}">
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
            </section>
