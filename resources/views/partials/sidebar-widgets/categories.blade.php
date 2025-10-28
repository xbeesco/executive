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
        <ul>
            @foreach($categories as $category)
                <li>
                    <span class="pbmit-cat-li">
                        @if(Route::has('categories.show'))
                            <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                        @else
                            <span>{{ $category->name }}</span>
                        @endif
                        <span class="pbmit-brackets">( {{ $category->posts_count }} )</span>
                    </span>
                </li>
            @endforeach
        </ul>
    </aside>
@endif
<!-- Categories Widget End -->
