@php
$data = $block['data'] ?? [];
@endphp
<section class="section-xl">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-6">
                @if(!empty($data['background_image']))
                <div class="about-one-leftbox" style="background-image: url('{{ image($data['background_image']) }}')">
                    <div class="ihbox-style-area">
                        <div class="pbmit-ihbox-style-12">
                            <div class="pbmit-ihbox-headingicon">
                                @if(!empty($data['left_icon']))
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                        <i class="{{ icon_class($data['left_icon']) }}"></i>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($data['left_title']))
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">{!! $data['left_title'] !!}</h2>
                                </div>
                                @endif
                                <div class="pbmit-sticky-corner pbmit-bottom-left-corner">
                                    <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
                                    </svg>
                                </div>
                                <div class="pbmit-sticky-corner pbmit-top-right-corner">
                                    <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="about-one-rightbox">
                    <div class="pbmit-heading-subheading animation-style2">
                        @if(!empty($data['subtitle']))
                        <h4 class="pbmit-subtitle">{{ $data['subtitle'] }}</h4>
                        @endif
                        @if(!empty($data['title']))
                        <h2 class="pbmit-title">{{ $data['title'] }}</h2>
                        @endif
                        @if(!empty($data['description']))
                        <div class="pbmit-heading-desc">
                            {{ $data['description'] }}
                        </div>
                        @endif
                    </div>
                    @if(!empty($data['icon_boxes']) && is_array($data['icon_boxes']))
                    <div class="row g-3">
                        @foreach($data['icon_boxes'] as $box)
                        <div class="col-md-6">
                            <article class="pbmit-miconheading-style-9">
                                <div class="pbmit-ihbox-style-9">
                                    <div class="pbmit-ihbox-box d-flex align-items-center">
                                        @if(!empty($box['icon']))
                                        <div class="pbmit-ihbox-icon">
                                            <div class="pbmit-ihbox-icon-wrapper">
                                                <div class="pbmit-icon-wrapper pbmit-icon-type-icon">
                                                    <i class="{{ icon_class($box['icon']) }}"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="pbmit-ihbox-contents">
                                            <h2 class="pbmit-element-title">
                                                {{ $box['title'] }}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if(!empty($data['signature_name']) || !empty($data['signature_image']))
                    <div class="pbmit-ihbox pbmit-ihbox-style-5 pt-5">
                        <div class="pbmit-ihbox-box d-flex align-items-center">
                            <div class="pbmit-content-wrapper">
                                @if(!empty($data['signature_name']))
                                <h2 class="pbmit-element-title">{{ $data['signature_name'] }}</h2>
                                @endif
                                @if(!empty($data['signature_position']))
                                <div class="pbmit-heading-desc">{{ $data['signature_position'] }}</div>
                                @endif
                            </div>
                            @if(!empty($data['signature_image']))
                            <div class="pbmit-icon-wrapper">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
                                        <img src="{{ image($data['signature_image']) }}" alt="{{ $data['signature_name'] }}">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
