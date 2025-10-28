<!-- Tags Widget -->
@php
    $widgetTitle = $title ?? 'Tag Cloud';
    $maxTags = $count ?? 15;
    $tags = \App\Models\Tag::withCount('posts')
        ->orderBy('posts_count', 'desc')
        ->orderBy('name', 'asc')
        ->take($maxTags)
        ->get();
@endphp

@if($tags->isNotEmpty())
    <aside class="widget widget-tag-cloud">
        <h2 class="widget-title">{{ $widgetTitle }}</h2>
        <div class="tagcloud d-flex flex-wrap gap-2">
            @foreach($tags as $tag)
                @if(Route::has('tags.show'))
                    <a href="{{ route('tags.show', $tag->slug) }}" class="tag-cloud-link" style="font-size: 0.875rem; padding: 0.25rem 0.75rem; white-space: nowrap;">{{ $tag->name }}</a>
                @else
                    <span class="tag-cloud-link" style="font-size: 0.875rem; padding: 0.25rem 0.75rem; white-space: nowrap;">{{ $tag->name }}</span>
                @endif
            @endforeach
        </div>
    </aside>
@endif
<!-- Tags Widget End -->
