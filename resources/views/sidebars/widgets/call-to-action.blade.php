<!-- Call to Action Widget -->
@php
    $widgetTitle = $title ?? 'Call to Action';
    $widgetSubtitle = $subtitle ?? 'Ready to start?';
    $widgetCta = $cta_text ?? 'Contact us now!';
    $widgetButtonText = $button_text ?? 'Get Started';
    $widgetButtonLink = $button_link ?? '#';
    $backgroundImage = $background_image ?? null;

    // Get site-wide phone from settings instead of widget data
    $settingService = app(\App\Services\SettingService::class);
    $sitePhone = $settingService->getGeneral('site_phone', '');
@endphp

<aside class="widget pbmit-service-ad" @if($backgroundImage) style="background-image: url('{{ asset('storage/' . $backgroundImage) }}'); background-size: cover; background-position: center center; padding: 0;" @endif>
    <div class="textwidget">
        <div class="pbmit-service-ads p-4 text-center position-relative" style="overflow: hidden; border-radius: 8px;">
            @if($backgroundImage)
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 1;"></div>
            @endif

            <div class="position-relative" style="z-index: 2;">
                <h5 class="pbmit-ads-subheding mb-2" style="font-size: 0.875rem;@if($backgroundImage) color: #fff;@endif">{{ $widgetTitle }}</h5>
                <h4 class="pbmit-ads-subtitle mb-2" style="font-size: 1rem;@if($backgroundImage) color: #fff;@endif">{{ $widgetSubtitle }}</h4>
                <h3 class="pbmit-ads-title mb-3" style="font-size: 1.25rem;@if($backgroundImage) color: #fff;@endif">{{ $widgetCta }}</h3>

                @if($sitePhone)
                    <div class="pbmit-ads-desc mb-3" style="font-size: 0.875rem;@if($backgroundImage) color: #fff;@endif">
                        <i class="pbmit-base-icon-phone-call-1 me-1"></i>{{ $sitePhone }}
                    </div>
                @endif

                <a class="pbmit-btn pbmit-btn-hover-white w-100" href="{{ $widgetButtonLink }}">
                    <span class="pbmit-button-content-wrapper">
                        <span class="pbmit-button-text" style="font-size: 0.9rem;">{{ $widgetButtonText }}</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</aside>
<!-- Call to Action Widget End -->
