<!-- Content Accordion Block (No Section Wrapper) -->
<div class="content-accordion-block mb-4">
    @if(!empty($block['data']['items']) && is_array($block['data']['items']))
        @php
            $accordionId = 'accordion-' . uniqid();
        @endphp
        <div class="accordion" id="{{ $accordionId }}">
            @foreach($block['data']['items'] as $index => $item)
                @php
                    $itemId = $accordionId . '-item-' . $index;
                    $isFirst = $index === 0;
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{ $itemId }}">
                        <button
                            class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $itemId }}"
                            aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                            aria-controls="collapse-{{ $itemId }}"
                        >
                            @if(!empty($item['icon']))
                                <i class="{{ $item['icon'] }} me-2"></i>
                            @endif
                            {{ $item['title'] }}
                        </button>
                    </h2>
                    <div
                        id="collapse-{{ $itemId }}"
                        class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                        aria-labelledby="heading-{{ $itemId }}"
                        data-bs-parent="#{{ $accordionId }}"
                    >
                        <div class="accordion-body">
                            {!! $item['content'] ?? '' !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<!-- Content Accordion End -->
