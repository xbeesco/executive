<section class="section-md">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-6">
                <div class="accordion-eight-left-box">
                    <div class="pbmit-heading animation-style4">
                        <h2 class="pbmit-title">{{ $block['data']['title'] ?? '' }}</h2>
                    </div>
                    @if(!empty($block['data']['description']))
                    <div class="pbmit-desc">
                        <p>{{ $block['data']['description'] }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="accordion-eight-area">
                    <div class="accordion pbmit-accordion-style-1 pbmit-accordion-blackish-bg" id="accordionExample1">
                        @foreach($block['data']['accordion_items'] ?? [] as $index => $item)
                            <div class="accordion-item {{ $index === 0 ? 'active' : '' }}">
                                <h2 class="accordion-header" id="heading{{ $index + 1 }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index + 1 }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index + 1 }}">
                                        <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                                            <span class="pbmit-accordion-icon-closed">
                                                <svg class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                                </svg>
                                            </span>
                                            <span class="pbmit-accordion-icon-opened">
                                                <svg class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="pbmit-accordion-title">
                                            <span>{{ $item['number'] ?? str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            {{ $item['title'] ?? '' }}
                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index + 1 }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index + 1 }}" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <p>{{ $item['content'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>            
