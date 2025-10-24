<section class="archive-section">
    <div class="archive-items archive-{{ $template ?? 'grid-col-3' }}">
        @forelse($items as $item)
            <article class="archive-item">
                @if($item->featured_image)
                    <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="item-image">
                @endif
                <div class="item-content">
                    <h3><a href="{{ route($type . 's.show', $item) }}">{{ $item->title }}</a></h3>
                    <p class="item-excerpt">{{ $item->excerpt ?? Str::limit(strip_tags($item->content[0]['content'] ?? ''), 150) }}</p>
                    <a href="{{ route($type . 's.show', $item) }}" class="read-more">Read More →</a>
                </div>
            </article>
        @empty
            <p>No items found.</p>
        @endforelse
    </div>

    @if($items instanceof \Illuminate\Pagination\Paginator && $items->hasPages())
        <div class="pagination">
            {{ $items->links() }}
        </div>
    @endif
</section>
