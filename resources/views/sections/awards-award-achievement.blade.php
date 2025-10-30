            <section class="ihbox-sec-six">
				<div class="container">
					<div class="pbmit-heading-title">
						<h2 class="pbmit-title">{{ $block['data']['title'] ?? 'Awards & Recognition' }}</h2>
					</div>
					<div class="row g-0 pt-3">
						@foreach(($block['data']['awards'] ?? []) as $award)
						<div class="pbmit-col-20">
							<div class="pbmit-ihbox-style-10">
								<div class="pbmit-ihbox-headingicon">
									<div class="pbmit-ihbox-icon">
										<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
											<img src="{{ image($award['icon_image'] ?? 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) . '.png', 'section_image') }}" alt="{{ $award['title'] ?? '' }}">
										</div>
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title">{{ $award['title'] ?? '' }}</h2>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
            </section>
