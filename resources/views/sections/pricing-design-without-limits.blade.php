@php
    // Default values
    $subtitle = $block['data']['subtitle'] ?? 'Why Executive Professionals Choose Us';
    $title = $block['data']['title'] ?? 'Excellence without compromise, success <br> guaranteed.';
    $backgroundImage = $block['data']['background_image'] ?? '';
    $columns = $block['data']['columns'] ?? '4';
    $autoplay = $block['data']['autoplay'] ?? false;
    $enableLoop = $block['data']['loop'] ?? true;
    $features = $block['data']['features'] ?? [];
@endphp

<section>
    <div class="container p-0">
        <div class="ihbox-style-10-bg-area pbmit-bg-color-light-2" style="background-image: url('{{ image($backgroundImage, 'section_background') }}')">
            @if($subtitle || $title)
                <div class="pbmit-heading-subheading text-center animation-style2">
                    @if($subtitle)
                        <h4 class="pbmit-subtitle">{!! $subtitle !!}</h4>
                    @endif
                    @if($title)
                        <h2 class="pbmit-title">{!! $title !!}</h2>
                    @endif
                </div>
            @endif

            @if(!empty($features))
                <div class="swiper-slider" data-autoplay="{{ $autoplay ? 'true' : 'false' }}" data-loop="{{ $enableLoop ? 'true' : 'false' }}" data-dots="false" data-arrows="false" data-columns="{{ $columns }}" data-margin="30" data-effect="slide">
                    <div class="swiper-wrapper">
                        @foreach($features as $index => $feature)
                            @php
                                $icon = $feature['icon'] ?? 'pbmit-xinterio-icon-living-room';
                                $featureTitle = $feature['title'] ?? '';
                                $description = $feature['description'] ?? '';
                                $number = $feature['number'] ?? str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                            @endphp

                            <!-- Slide{{ $loop->iteration }} -->
                            <article class="pbmit-miconheading-style-17 swiper-slide">
                                <div class="pbmit-ihbox-style-17">
                                    <div class="pbmit-ihbox-box">
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                                <i class="{{ icon_class($icon) }}"></i>
                                            </div>
                                        </div>
                                        @if($featureTitle)
                                            <h2 class="pbmit-element-title">
                                                {!! $featureTitle !!}
                                            </h2>
                                        @endif
                                        @if($description)
                                            <div class="pbmit-heading-desc">{!! $description !!} </div>
                                        @endif
                                    </div>
                                    <div class="pbmit-box-number-wrap">
                                        <div class="pbmit-ihbox-box-number">{{ $number }}</div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
