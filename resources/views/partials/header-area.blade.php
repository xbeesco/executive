{{-- Header Area: Slider or Title Bar (based on settings) --}}

@if(($pageSettings['header_area_type'] ?? 'none') === 'slider')
    {{-- Slider (based on header_style) --}}
    @include('components.sliders.slider', ['headerStyle' => $pageSettings['header_style'] ?? 3])

@elseif(($pageSettings['header_area_type'] ?? 'none') === 'title_bar')
    {{-- Title Bar --}}
    @include('partials.title-bar')
@endif
