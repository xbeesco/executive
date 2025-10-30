			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-xl-6">
							<div class="accordion-two-area">
								@if(!empty($block['data']['subtitle']) || !empty($block['data']['title']))
								<div class="pbmit-heading-subheading animation-style3">
									@if(!empty($block['data']['subtitle']))
									<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
									@endif
									@if(!empty($block['data']['title']))
									<h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
									@endif
								</div>
								@endif
								@if(!empty($block['data']['items']) && is_array($block['data']['items']))
								<div class="accordion" id="accordionExample1">
									@foreach($block['data']['items'] as $index => $item)
									<div class="accordion-item {{ $loop->first ? 'active' : '' }}">
										<h2 class="accordion-header" id="heading{{ $loop->iteration }}">
											<button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $loop->iteration }}">
												<span class="pbmit-accordion-icon pbmit-accordion-icon-right">
													<span class="pbmit-accordion-icon-closed">
														<svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
													<span class="pbmit-accordion-icon-opened">
														<svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
															<path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
														</svg>
													</span>
												</span>
												<span class="pbmit-accordion-title">
													{{ $item['question'] ?? '' }}
												</span>
											</button>
										</h2>
										<div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $loop->iteration }}" data-bs-parent="#accordionExample1">
											<div class="accordion-body">
												<p>{{ $item['answer'] ?? '' }}</p>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								@endif
							</div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="accordion-two-rightbox">
								@if(!empty($block['data']['chair_image']))
								<div class="chair-img pbmit-move-sofa">
									<img src="{{ image($block['data']['chair_image'], 'section_image') }}" alt="">
								</div>
								@endif
								@if(!empty($block['data']['sofa_image']))
								<div class="sofa-img pbmit-move-sofa">
									<img src="{{ image($block['data']['sofa_image'], 'section_image') }}" class="img-fluid" alt="">
								</div>
								@endif
								@if(!empty($block['data']['floor_image']))
								<div class="floor-img">
									<img src="{{ image($block['data']['floor_image'], 'section_image') }}" class="img-fluid" alt="">
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</section>
