{{-- Slider Component - Dynamic Slider Selector --}}
@php
    $sliderId = $pageSettings['slider_id'] ?? 'slider-1';
@endphp

@include('components.sliders.' . $sliderId)
