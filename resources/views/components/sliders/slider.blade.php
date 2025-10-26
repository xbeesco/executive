@php
    $sliderId = $sliderId ?? 'slider-1';
@endphp

@if($sliderId === 'slider-1')
    @include('components.sliders.slider-1')
@elseif($sliderId === 'slider-2')
    @include('components.sliders.slider-2')
@endif
