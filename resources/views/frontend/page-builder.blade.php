@forelse($blocks ?? [] as $block)
    @php
        $viewName = "frontend.blocks.{$block['type'] ?? 'text'}";
    @endphp
    @if(view()->exists($viewName))
        @include($viewName, ['block' => $block])
    @else
        <!-- Block type "{!! $block['type'] ?? 'unknown' !!}" not found -->
    @endif
@empty
    <!-- No content blocks to display -->
@endforelse
