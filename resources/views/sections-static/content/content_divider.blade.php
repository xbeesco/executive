<!-- Content Divider Block (No Section Wrapper) -->
<div class="content-divider-block my-4">
    @php
        $style = $block['data']['style'] ?? 'solid';
        $color = $block['data']['color'] ?? 'secondary';
        $thickness = $block['data']['thickness'] ?? '1';
        $width = $block['data']['width'] ?? '100';
    @endphp

    <hr
        class="border-{{ $color }} opacity-{{ $block['data']['opacity'] ?? '25' }}"
        style="border-width: {{ $thickness }}px; border-style: {{ $style }}; width: {{ $width }}%; margin: 0 auto;"
    >

    @if(!empty($block['data']['text']))
        <div class="text-center mt-3 mb-3">
            <span class="badge bg-{{ $color }} text-{{ $color === 'light' ? 'dark' : 'white' }}">
                {{ $block['data']['text'] }}
            </span>
        </div>
    @endif
</div>
<!-- Content Divider End -->
