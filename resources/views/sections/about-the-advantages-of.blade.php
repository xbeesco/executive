@php
	$data = $block['data'] ?? $block;
@endphp
			<section class="about-us-nine-bg" style="background-image: url('{{ image($data['background_image'], 'section_background') }}')">
				<div class="container p-0">
					<div class="row g-0">
						<div class="col-md-12 col-xl-6 pbmit-col1"></div>
						<div class="col-md-12 col-xl-6 pbmit-col2">
							<div class="pbmit-bg-color-blackish about-us-content">
								<div class="pbmit-heading-subheading animation-style4">
									@if(!empty($data['subtitle']))
										<h4 class="pbmit-subtitle">{{ $data['subtitle'] }}</h4>
									@endif
									<h2 class="pbmit-title">{!! $data['title'] !!}</h2>
									<div class="pbmit-heading-desc">
										@if(!empty($data['description_1']))
											{!! nl2br(e($data['description_1'], false)) !!}
										@endif
										@if(!empty($data['description_2']))
											<br>
											<br>
											{!! nl2br(e($data['description_2'], false)) !!}
										@endif
									</div>
								</div>
								@if(!empty($data['signature_image']))
									<div class="mt-5">
										<img src="{{ image($data['signature_image'], 'section_image') }}" alt="">
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</section>
