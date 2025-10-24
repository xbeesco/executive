@forelse($blocks ?? [] as $block)
    @php
        $blockType = $block['type'] ?? 'text';
        $viewName = "frontend.blocks.{$blockType}";
    @endphp
    @if(view()->exists($viewName))
        @include($viewName, ['block' => $block])
    @else
        <!-- Block type "{!! $block['type'] ?? 'unknown' !!}" not found -->
    @endif
@empty
    <!-- No content blocks to display -->
@endforelse
