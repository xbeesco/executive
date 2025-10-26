{{-- Header Area: Slider or Title Bar (based on settings) --}}

@if(($pageSettings['header_area_type'] ?? 'none') === 'slider')
    {{-- Slider --}}
    @include('sliders.slider', ['sliderData' => $sliderData ?? []])

@elseif(($pageSettings['header_area_type'] ?? 'none') === 'title_bar')
    {{-- Title Bar --}}
    @include('partials.title-bar')
@endif
