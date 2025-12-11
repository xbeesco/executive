            <section class="about-five-bg" style="background-image: url('{{ image($block['data']['background_image'], 'section_background') }}')">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-6">
							<div class="about-five-left-box" style="background-image: url('{{ image($block['data']['left_background_image'], 'section_background') }}')">
								<div class="ihbox-style-area">
									<div class="pbmit-ihbox-style-20">
										<div class="pbmit-ihbox-headingicon">
											<a class="pbmin-lightbox-video  d-flex align-items-center" href="{{ $block['data']['video_url'] }}">
												<div class="pbmit-ihbox-icon">
													<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
														<i class="{{ icon_class($block['data']['video_icon']) }}"></i>
													</div>
												</div>
												<h2 class="pbmit-element-title">{{ $block['data']['video_title'] }}</h2>
											</a>
											<div class="pbmit-ihbox-contents"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="about-five-rightbox">
								<div class="pbmit-heading-subheading animation-style2">
									<h4 class="pbmit-subtitle">{{ $block['data']['subtitle'] }}</h4>
									<h2 class="pbmit-title">{{ $block['data']['title'] }}</h2>
								</div>
								<div class="about-five-content">
									<p>{{ $block['data']['description_1'] ?? 'Executive workspace excellence represents the evolution of professional environments where premium design meets strategic functionality. Our approach combines Italian craftsmanship, cutting-edge technology, and personalized services to create spaces that inspire innovation and foster success.' }}</p>
									<p>{{ $block['data']['description_2'] ?? 'We deliver two categories of executive solutions: Premium Private Offices designed for established leaders requiring dedicated spaces, and Flexible Executive Suites offering complete workspace ecosystems with comprehensive business support services and global networking opportunities.' }}</p>
									<div class="pbmit-animation-style1">
										<img src="{{ image($block['data']['signature_image'], 'section_image') }}" class="img-fluid" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>
