            <section class="section-xl pbmit-element-static-box-style-1">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style2">
						<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] ?? 'Excellence Redefined' }}</h4>
						<h2 class="pbmit-title">{{ $block['data']['title'] ?? 'Your Executive Journey' }}</h2>
					</div>
					<div class="pbmit-element-posts-wrapper row g-0">
						@foreach($block['data']['members'] ?? [] as $memberIndex => $member)
							<article class="pbmit-static-box-style-1">
								<div class="pbmit-staticbox-wrapper">
									<div class="pbmit-bg-imgbox" style="background-image: url('{{ image($member['background_image'] ?? $member['image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/static-box/sbox-img-0' . ($memberIndex + 1) . '.jpg', 'section_background', $loop->parent->iteration + $memberIndex) }}')">
										<div class="pbmit-img">
											<img src="{{ image($member['image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/static-box/sbox-img-0' . ($memberIndex + 1) . '.jpg', 'section_image', $loop->parent->iteration + $memberIndex) }}" alt="{{ $member['name'] ?? '' }}">
										</div>
										<div class="pbmit-box-number">{{ $member['number'] ?? str_pad($memberIndex + 1, 2, '0', STR_PAD_LEFT) }}</div>
										<h4 class="pbmit-static-box-title">{{ $member['name'] ?? '' }}</h4>
									</div>
									<div class="pbmit-content-box">
										<div class="pbmit-box-number">{{ $member['number'] ?? str_pad($memberIndex + 1, 2, '0', STR_PAD_LEFT) }}</div>
										<div class="pbmit-content-inner">
											<h4 class="pbmit-static-box-title">{{ $member['name'] ?? '' }}</h4>
											@if(!empty($member['description']))
												<div class="pbmit-static-box-desc">{{ $member['description'] }}</div>
											@endif
										</div>
										@if(!empty($member['button_text']))
											<div class="pbmit-static-btn">
												<a class="pbmit-button-inner" href="{{ $member['button_link'] ?? '#' }}">
													<span class="pbmit-button-wrapper">
														<span class="pbmit-button-text">{{ $member['button_text'] }}</span>
													</span>
												</a>
											</div>
										@endif
									</div>
									<a class="pbmit-link" href="{{ $member['button_link'] ?? '' }}"></a>
								</div>
							</article>
						@endforeach
					</div>
				</div>
            </section>
