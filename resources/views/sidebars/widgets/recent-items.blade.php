<!-- Recent Items Widget -->
@php
    $widgetType = $type ?? 'post'; // post, service, event
    $widgetTitle = $title ?? 'Recent Items';
    $widgetCount = $count ?? 5;

    // Get recent items based on type
    $items = collect();
    if ($widgetType === 'post') {
        $items = \App\Models\Post::where('status', \App\Enums\ContentStatus::PUBLISHED)
            ->orderBy('published_at', 'desc')
            ->take($widgetCount)
            ->get();
    } elseif ($widgetType === 'service') {
        $items = \App\Models\Service::where('status', \App\Enums\ContentStatus::PUBLISHED)
            ->orderBy('created_at', 'desc')
            ->take($widgetCount)
            ->get();
    } elseif ($widgetType === 'event') {
        $items = \App\Models\Event::where('status', \App\Enums\ContentStatus::PUBLISHED)
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->take($widgetCount)
            ->get();
    }
@endphp

@if($items->isNotEmpty())
    <aside class="widget widget-recent-post">
        <h2 class="widget-title">{{ $widgetTitle }}</h2>
        <ul class="recent-post-list">
            @foreach($items as $item)
                <li class="recent-post-list-li d-flex align-items-start mb-3">
                    @if(!empty($item->featured_image))
                        <a class="recent-post-thum flex-shrink-0 me-3" href="{{ route($widgetType . 's.show', $item->slug) }}" style="width: 80px; height: 80px; overflow: hidden; border-radius: 4px;">
                            <img src="{{ asset('storage/' . $item->featured_image) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $item->title }}">
                        </a>
                    @endif
                    <div class="pbmit-rpw-content flex-grow-1">
                        @if($widgetType === 'post' && $item->published_at)
                            <span class="pbmit-rpw-date d-block mb-1" style="font-size: 0.875rem;">
                                <a href="{{ route($widgetType . 's.show', $item->slug) }}">{{ $item->published_at->format('M d, Y') }}</a>
                            </span>
                        @elseif($widgetType === 'event' && $item->start_date)
                            <span class="pbmit-rpw-date d-block mb-1" style="font-size: 0.875rem;">
                                <a href="{{ route($widgetType . 's.show', $item->slug) }}">{{ \Carbon\Carbon::parse($item->start_date)->format('M d, Y') }}</a>
                            </span>
                        @endif
                        <span class="pbmit-rpw-title d-block" style="font-size: 0.9rem; line-height: 1.4;">
                            <a href="{{ route($widgetType . 's.show', $item->slug) }}">{{ Str::limit($item->title, 50) }}</a>
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </aside>
@endif
<!-- Recent Items Widget End -->
