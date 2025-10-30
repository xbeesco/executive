@php
    // Extract data from block
    $data = $block['data'] ?? [];

    // Left Section Images
    $leftImage1 = !empty($data['left_image_1'])
        ? image($data['left_image_1'], 'section_image')
        : image('https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/about-img-01.jpg', 'section_image');

    $leftImage2 = !empty($data['left_image_2'])
        ? image($data['left_image_2'], 'section_image')
        : image('https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/about-02.jpg', 'section_image');

    $leftImageFrame = !empty($data['left_image_frame'])
        ? image($data['left_image_frame'], 'section_image')
        : image('https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/frame-img.png', 'section_image');

    // Right Section Background
    $rightBackgroundPattern = !empty($data['right_background_pattern'])
        ? image($data['right_background_pattern'], 'section_background')
        : image('https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/bg/about-pattern-bg.png', 'section_background');

    // Content
    $subtitle = $data['subtitle'] ?? '';
    $title = $data['title'] ?? 'Premium Executive Workspace Solutions';
    $description = $data['description'] ?? '';

    // List Items
    $listItems = $data['list_items'] ?? [];

    // Clock Image
    $clockImage = !empty($data['clock_image'])
        ? image($data['clock_image'], 'section_image')
        : image('https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/clock.png', 'section_image');

    // Icon Boxes
    $iconBoxes = $data['icon_boxes'] ?? [];
@endphp

<section class="section-lgt">
    <div class="container pbmit-col-stretched-yes pbmit-col-right">
        <div class="row g-0">
            <div class="col-md-12 col-xl-6">
                <div class="about-eight-left-box">
                    <div>
                        <img src="{{ $leftImage1 }}" class="about-img-first img-fluid" alt="">
                    </div>
                    <div class="about-img-second">
                        <img src="{{ $leftImage2 }}" class="img-fluid" alt="">
                    </div>
                    <div class="frame-img">
                        <img src="{{ $leftImageFrame }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6 position-relative">
                <div class="about-eight-right-box" style="background-image: url('{{ $rightBackgroundPattern }}')">
                    <div class="pbmit-col-stretched-right"></div>
                    <div class="pbmit-heading-subheading animation-style4">
                        @if(!empty($subtitle))
                        <h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
                        @endif
                        <h2 class="pbmit-title">{{ $title }}</h2>
                        @if(!empty($description))
                        <div class="pbmit-heading-desc">{{ $description }}</div>
                        @endif
                    </div>
                    @if(!empty($listItems) && count($listItems) > 0)
                    <ul class="list-group list-group-borderless">
                        @foreach($listItems as $item)
                        <li class="list-group-item">
                            <span class="pbmit-icon-list-text">{{ $item['text'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="clock-img">
                        <img src="{{ $clockImage }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($iconBoxes) && count($iconBoxes) > 0)
        <div class="about-eight-ihbox-style">
            <div class="about-eight-ihbox-style-bg pbmit-bg-color-blackish pbmit-ihbox-style-8-new">
                <div class="row g-0">
                    @foreach($iconBoxes as $box)
                    <div class="col-md-6 {{ $loop->first ? 'pe-md-5' : 'ps-md-5 mt-md-0 mt-4' }}">
                        <div class="pbmit-ihbox-style-8">
                            <div class="pbmit-ihbox-box d-flex">
                                <div class="pbmit-ihbox-icon">
                                    <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                        <i class="pbmit-xinterio-icon {{ $box['icon'] }}"></i>
                                    </div>
                                </div>
                                <div class="pbmit-ihbox-contents">
                                    <h2 class="pbmit-element-title">{{ $box['title'] }}</h2>
                                    <div class="pbmit-heading-desc">{{ $box['description'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
