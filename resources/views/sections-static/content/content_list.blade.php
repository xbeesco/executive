<!-- Content List Block (No Section Wrapper) -->
<div class="content-list-block mb-4">
    @if(!empty($block['data']['items']) && is_array($block['data']['items']))
        @php
            $listType = $block['data']['list_type'] ?? 'unordered';
            $listStyle = $block['data']['list_style'] ?? 'default';
        @endphp

        @if($listType === 'ordered')
            <ol class="list-{{ $listStyle }} ps-4">
                @foreach($block['data']['items'] as $item)
                    <li class="mb-2">
                        @if(!empty($item['icon']))
                            <i class="{{ $item['icon'] }} me-2"></i>
                        @endif
                        {{ $item['text'] }}
                    </li>
                @endforeach
            </ol>
        @else
            <ul class="list-{{ $listStyle }} ps-4">
                @foreach($block['data']['items'] as $item)
                    <li class="mb-2">
                        @if(!empty($item['icon']))
                            <i class="{{ $item['icon'] }} me-2"></i>
                        @endif
                        {{ $item['text'] }}
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
<!-- Content List End -->
