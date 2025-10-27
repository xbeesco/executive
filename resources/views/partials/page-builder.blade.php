@forelse($blocks ?? [] as $block)
    @php
        $blockType = $block['type'] ?? 'text';
        $mapper = app(\App\Services\BlockViewMapper::class);
        $viewName = $mapper->getViewName($blockType);
    @endphp
    @if(view()->exists($viewName))
        @include($viewName, ['block' => $block])
    @else
        <!-- Block type "{{ $blockType }}" mapped to "{{ $viewName }}" not found -->
    @endif
@empty
    <!-- No content blocks to display -->
@endforelse
