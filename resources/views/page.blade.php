@extends('layouts.layout')

@section('content')
    {{-- Slider Section (if enabled) --}}
    @if(($pageSettings['header_area_type'] ?? 'none') === 'slider')
        @include('sliders.slider', ['sliderData' => $sliderData ?? []])
    @endif

    {{-- Title Bar (if enabled) --}}
    @if(($pageSettings['header_area_type'] ?? 'none') === 'title_bar' || ($pageSettings['show_title_bar'] ?? false))
        @include('title-bar', [
            'title' => $page->title,
            'style' => $pageSettings['title_bar_style'] ?? 'style-1',
            'backgroundImage' => $pageSettings['title_bar_background_image'] ?? '',
            'showBreadcrumbs' => $pageSettings['show_breadcrumbs'] ?? true
        ])
    @endif

    {{-- Page Content --}}
    @if($page->isArchive())
        {{-- Archive Page --}}
        @include('archive', [
            'type' => $page->getArchiveContentType(),
            'template' => $page->getArchiveTemplate(),
            'items' => $items ?? [],
        ])
    @else
        {{-- Regular Page (Homepage or Inner Page) --}}
        @include('page-builder', ['blocks' => $page->content ?? []])
    @endif
@endsection
