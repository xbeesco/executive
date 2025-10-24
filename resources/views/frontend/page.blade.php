@extends('layouts.app')

@section('content')
    @php
        $headerStyle = $page->getHeaderStyle();
        $footerStyle = $page->getFooterStyle();
        $showTitleBar = $page->settings['show_title_bar'] ?? false;
        $pageType = $page->getPageType();
    @endphp

    @include('components.header', ['style' => $headerStyle])

    @if($showTitleBar)
        @include('components.title-bar', ['title' => $page->title])
    @endif

    <div class="page-content">
        @switch($pageType)
            @case('homepage')
                @include('frontend.page-builder', ['blocks' => $page->content ?? []])
                @break
            @case('inner_page')
                @include('frontend.page-builder', ['blocks' => $page->content ?? []])
                @break
            @case('archive')
                @include('frontend.archive', [
                    'type' => $page->getArchiveContentType(),
                    'template' => $page->getArchiveTemplate(),
                    'items' => $items ?? [],
                ])
                @break
        @endswitch
    </div>

    @include('components.footer', ['style' => $footerStyle])
@endsection
