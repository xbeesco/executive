@php
    $headerStyle = $headerStyle ?? 3;
@endphp

@if($headerStyle == 3)
    @include('components.sliders.slider-1')
@elseif($headerStyle == 4)
    @include('components.sliders.slider-2')
@elseif($headerStyle == 8)
    @include('components.sliders.slider-3')
@endif
