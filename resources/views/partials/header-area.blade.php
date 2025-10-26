{{-- Header Area: Slider or Title Bar (based on settings) --}}

@if(($pageSettings['header_area_type'] ?? 'none') === 'slider')
    {{-- Slider --}}
    @include('components.sliders.slider', ['sliderId' => $pageSettings['slider_id'] ?? 'slider-1'])

@elseif(($pageSettings['header_area_type'] ?? 'none') === 'title_bar')
    {{-- Title Bar --}}
    @include('partials.title-bar')
@endif
