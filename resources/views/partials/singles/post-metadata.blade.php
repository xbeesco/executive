<!-- Post Metadata Section -->
@if(!empty($post->featured_image))
    <div class="post-featured-image mb-4">
        <img
            src="{{ asset('storage/' . $post->featured_image) }}"
            alt="{{ $post->title }}"
            class="img-fluid w-100 rounded"
        >
    </div>
@endif

<div class="post-meta-info mb-4">
    <div class="d-flex flex-wrap gap-3 text-muted">
        @if($post->published_at)
            <div class="meta-item">
                <i class="far fa-calendar me-1"></i>
                <time datetime="{{ $post->published_at->toIso8601String() }}">
                    {{ $post->published_at->format('F d, Y') }}
                </time>
            </div>
        @endif

        @if($post->author)
            <div class="meta-item">
                <i class="far fa-user me-1"></i>
                <span>By {{ $post->author->name }}</span>
            </div>
        @endif

        @if($post->categories && $post->categories->isNotEmpty())
            <div class="meta-item">
                <i class="far fa-folder me-1"></i>
                @foreach($post->categories as $category)
                    @if(Route::has('posts.category'))
                        <a href="{{ route('posts.category', $category->slug) }}" class="text-decoration-none text-muted hover-primary">
                            {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                        </a>
                    @else
                        <span>{{ $category->name }}{{ !$loop->last ? ',' : '' }}</span>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>

@if($post->tags && $post->tags->isNotEmpty())
    <div class="post-tags mb-4">
        <div class="d-flex flex-wrap gap-2">
            <span class="text-muted me-2">
                <i class="fas fa-tags"></i> Tags:
            </span>
            @foreach($post->tags as $tag)
                @if(Route::has('posts.tag'))
                    <a href="{{ route('posts.tag', $tag->slug) }}" class="badge bg-light text-dark text-decoration-none">
                        {{ $tag->name }}
                    </a>
                @else
                    <span class="badge bg-light text-dark">
                        {{ $tag->name }}
                    </span>
                @endif
            @endforeach
        </div>
    </div>
@endif
<!-- Post Metadata End -->
