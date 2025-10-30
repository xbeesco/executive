@php
    // Extract data from block
    $data = $block['data'] ?? [];

    // Prepare background image
    $backgroundImage = !empty($data['background_image'])
        ? image($data['background_image'])
        : image('https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/about-us-bg.jpg', 'section_background');

    // Prepare phone data
    $phoneIcon = $data['phone_icon'] ?? 'pbmit-base-icon-phone-volume-solid-1';
    $phone = $data['phone'] ?? '+125-8845-5421';
    $phoneClean = preg_replace('/[^0-9+]/', '', $phone);

    // Prepare text content
    $subtitle = $data['subtitle'] ?? 'EXCLUSIVE MEMBERSHIP OFFER';
    $titlePrefix = $data['title_prefix'] ?? 'We create executive spaces so';
    $titleSuffix = $data['title_suffix'] ?? "you'll elevate your business";
    $badgeText = $data['badge_text'] ?? 'Premium Access';

    // Prepare rotating words
    $rotatingWords = [];
    if (!empty($data['rotating_words']) && is_array($data['rotating_words'])) {
        foreach ($data['rotating_words'] as $item) {
            if (!empty($item['word'])) {
                $rotatingWords[] = $item['word'];
            }
        }
    }
    if (empty($rotatingWords)) {
        $rotatingWords = ['distinguished', 'impressive', 'sophisticated', 'prestigious'];
    }
    $rotatingWordsString = implode(', ', $rotatingWords);
@endphp

<section class="about-us-five-bg fadeIn animated animated-slow" style="background-image: url('{{ $backgroundImage }}')">
    <div class="ihbox-style-area">
        <div class="pbmit-ihbox pbmit-ihbox-style-18">
            <div class="pbmit-ihbox-headingicon d-flex align-items-center">
                <div class="pbmit-ihbox-icon">
                    <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                        <i class="{{ $phoneIcon }}"></i>
                    </div>
                </div>
                <div class="pbmit-ihbox-contents">
                    <h2 class="pbmit-element-title">
                        <a class="pbmit-button-inner" href="tel:{{ $phoneClean }}">
                            <span class="pbmit-button-wrapper">
                                <span class="pbmit-button-text">{{ $phone }}</span>
                            </span>
                        </a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-8">
                <div class="pbmit-heading-subheading animation-style4">
                    <h4 class="pbmit-subtitle">{{ $subtitle }}</h4>
                    <h2 class="pbmit-title">{{ $titlePrefix }} <span id="js-rotating">{{ $rotatingWordsString }}</span> {{ $titleSuffix }}</h2>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="d-flex justify-content-center">
                    <div class="pbmit-ihbox-style-21">
                        <div class="pbmit-ihbox-contents">
                        <h2 class="pbmit-element-title">{{ $badgeText }}</h2>
                        </div>
                        <div class="pbmit-ihbox-content-area"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
