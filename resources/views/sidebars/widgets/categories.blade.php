<!-- Categories Widget -->
@php
    $widgetTitle = $title ?? 'Categories';
    $categories = \App\Models\Category::withCount('posts')
        ->having('posts_count', '>', 0)
        ->orderBy('name', 'asc')
        ->get();
@endphp

@if($categories->isNotEmpty())
    <aside class="widget widget-categories">
        <h2 class="widget-title">{{ $widgetTitle }}</h2>
        <ul class="list-unstyled">
            @foreach($categories as $category)
                <li class="mb-2">
                    <span class="pbmit-cat-li d-flex justify-content-between align-items-center">
                        @if(Route::has('categories.show'))
                            <a href="{{ route('categories.show', $category->slug) }}" class="flex-grow-1 text-truncate" style="font-size: 0.9rem;">{{ $category->name }}</a>
                        @else
                            <span class="flex-grow-1 text-truncate" style="font-size: 0.9rem;">{{ $category->name }}</span>
                        @endif
                        <span class="pbmit-brackets ms-2 flex-shrink-0" style="font-size: 0.875rem;">( {{ $category->posts_count }} )</span>
                    </span>
                </li>
            @endforeach
        </ul>
    </aside>
@endif
<!-- Categories Widget End -->
