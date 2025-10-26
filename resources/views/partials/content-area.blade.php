{{-- Content Area: Page Builder or Archive (based on settings) --}}

@if(($pageSettings['is_archive'] ?? false))
    {{-- Archive Content --}}
    @include('partials.archive', [
        'type' => $page->getArchiveContentType(),
        'template' => $page->getArchiveTemplate(),
        'items' => $items ?? [],
    ])
@else
    {{-- Page Builder Content --}}
    @include('partials.page-builder', ['blocks' => $page->content ?? []])
@endif
