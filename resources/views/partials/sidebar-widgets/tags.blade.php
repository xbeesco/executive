<!-- Tags Widget -->
@php
    $widgetTitle = $title ?? 'Tag Cloud';
    $maxTags = $count ?? 15;
    $tags = \App\Models\Tag::withCount('posts')
        ->having('posts_count', '>', 0)
        ->orderBy('posts_count', 'desc')
        ->take($maxTags)
        ->get();
@endphp

@if($tags->isNotEmpty())
    <aside class="widget widget-tag-cloud">
        <h3 class="widget-title">{{ $widgetTitle }}</h3>
        <div class="tagcloud">
            @foreach($tags as $tag)
                @if(Route::has('tags.show'))
                    <a href="{{ route('tags.show', $tag->slug) }}" class="tag-cloud-link">{{ $tag->name }}</a>
                @else
                    <span class="tag-cloud-link">{{ $tag->name }}</span>
                @endif
            @endforeach
        </div>
    </aside>
@endif
<!-- Tags Widget End -->
