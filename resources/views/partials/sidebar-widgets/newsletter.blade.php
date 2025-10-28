<!-- Newsletter Widget -->
@php
    $widgetTitle = $title ?? 'Our Newsletter';
    $widgetSubtitle = $subtitle ?? 'Ready to start learn ?';
    $widgetCta = $cta_text ?? 'Sign up now!';
    $widgetPhone = $phone ?? '';
    $widgetButtonText = $button_text ?? 'Register now';
    $widgetButtonLink = $button_link ?? '#';
@endphp

<aside class="widget pbmit-service-ad">
    <div class="textwidget">
        <div class="pbmit-service-ads">
            <h5 class="pbmit-ads-subheding">{{ $widgetTitle }}</h5>
            <h4 class="pbmit-ads-subtitle">{{ $widgetSubtitle }}</h4>
            <h3 class="pbmit-ads-title">{{ $widgetCta }}</h3>
            @if($widgetPhone)
                <div class="pbmit-ads-desc">
                    <i class="pbmit-base-icon-phone-call-1"></i>{{ $widgetPhone }}
                </div>
            @endif
            <a class="pbmit-btn pbmit-btn-hover-white" href="{{ $widgetButtonLink }}">
                <span class="pbmit-button-content-wrapper">
                    <span class="pbmit-button-text">{{ $widgetButtonText }}</span>
                </span>
            </a>
        </div>
    </div>
</aside>
<!-- Newsletter Widget End -->
