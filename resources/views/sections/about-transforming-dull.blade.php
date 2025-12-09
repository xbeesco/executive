@php
    $data = $block['data'] ?? [];
@endphp
<section class="section-xl pbmit-bg-color-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-3">
                <div class="d-xl-block d-flex justify-content-center flex-wrap">
                    @if(!empty($data['left_image_1']))
                    <div class="text-center">
                        <div class="pbmit-animation-style1 frame-clock-img">
                            <img src="{{ image($data['left_image_1']) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    @endif
                    @if(!empty($data['left_image_2']))
                    <div class="text-left">
                        <div class="pbmit-animation-style3 home4-about-02-img">
                            <img src="{{ image($data['left_image_2']) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="about-four-center-area">
                    <div class="pbmit-heading-subheading text-center animation-style4">
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
                    @if(!empty($data['features']) && is_array($data['features']))
                        <div class="row">
                            @foreach($data['features'] as $feature)
                                <article class="pbmit-miconheading-style-16 col-md-6">
                                    <div class="pbmit-ihbox-style-16">
                                        <div class="pbmit-ihbox-box d-flex align-items-center">
                                            @if(!empty($feature['icon']))
                                            <div class="pbmit-ihbox-icon">
                                                <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                                    <i class="{{ icon_class($feature['icon']) }}"></i>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="pbmit-ihbox-contents">
                                                <h2 class="pbmit-element-title">
                                                    {{ $feature['title'] }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                    @if(!empty($data['signature_image']))
                        <div class="text-center mt-4">
                            <div class="pbmit-animation-style4">
                                <img src="{{ image($data['signature_image']) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12 col-xl-3">
                <div class="position-relative">
                    @if(!empty($data['right_image_1']))
                    <div class="text-md-end text-center pt-xl-5">
                        <div class="pbmit-animation-style2">
                            <img src="{{ image($data['right_image_1']) }}" class="img-fluid rounded-4" alt="">
                        </div>
                    </div>
                    @endif
                    @if(!empty($data['right_image_2']))
                    <div class="about-four-lamp-img">
                        <div class="pbmit-animation-style3">
                            <img src="{{ image($data['right_image_2']) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
