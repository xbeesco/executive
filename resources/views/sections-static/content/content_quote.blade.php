<!-- Content Quote Block (No Section Wrapper) -->
<div class="content-quote-block mb-4">
    <blockquote class="blockquote border-start border-primary border-4 ps-4 py-3 bg-light rounded">
        <p class="mb-2 fs-5 fst-italic">
            "{{ $block['data']['quote'] ?? '' }}"
        </p>
        @if(!empty($block['data']['author']))
            <footer class="blockquote-footer mt-2">
                {{ $block['data']['author'] }}
                @if(!empty($block['data']['author_title']))
                    <cite title="{{ $block['data']['author_title'] }}">{{ $block['data']['author_title'] }}</cite>
                @endif
            </footer>
        @endif
    </blockquote>
</div>
<!-- Content Quote End -->
