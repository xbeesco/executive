@forelse($blocks ?? [] as $block)
    @php
        $blockType = $block['type'] ?? 'text';
        $mapper = app(\App\Services\BlockViewMapper::class);
        $useDemoSections = isset($page) ? $page->useDemoSections() : false;
        $viewName = $mapper->getViewName($blockType, $useDemoSections);
    @endphp
    @if(view()->exists($viewName))
        @include($viewName, ['block' => $block])
    @else
        <!-- Block type "{{ $blockType }}" mapped to "{{ $viewName }}" not found -->
    @endif
@empty
    <!-- No content blocks to display -->
@endforelse
