<!-- Upcoming Events Widget -->
@php
    $widgetTitle = $title ?? 'Upcoming Events';
    $widgetCount = $count ?? 5;
    $eventType = $event_type ?? 'upcoming';

    // Get events based on selected type
    if ($eventType === 'upcoming') {
        // Get only upcoming events (future events)
        $events = \App\Models\Event::upcoming()
            ->take($widgetCount)
            ->get();
    } else {
        // Get all published events
        $events = \App\Models\Event::published()
            ->orderBy('start_date', 'desc')
            ->take($widgetCount)
            ->get();
    }
@endphp

@if($events->isNotEmpty())
    <aside class="widget widget-recent-post">
        <h2 class="widget-title">{{ $widgetTitle }}</h2>
        <ul class="recent-post-list">
            @foreach($events as $event)
                <li class="recent-post-list-li d-flex align-items-start mb-3">
                    @if(!empty($event->featured_image))
                        <a class="recent-post-thum flex-shrink-0 me-3" href="{{ route('events.show', $event->slug) }}" style="width: 80px; height: 80px; overflow: hidden; border-radius: 4px;">
                            <img src="{{ asset('storage/' . $event->featured_image) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $event->title }}">
                        </a>
                    @endif
                    <div class="pbmit-rpw-content flex-grow-1">
                        @if($event->start_date)
                            <span class="pbmit-rpw-date d-block mb-1" style="font-size: 0.875rem; color: #666;">
                                @if($event->end_date && $event->start_date->format('Y-m-d') !== $event->end_date->format('Y-m-d'))
                                    {{ $event->start_date->format('M d, Y') }} : {{ $event->end_date->format('M d, Y') }}
                                @else
                                    {{ $event->start_date->format('M d, Y') }}
                                @endif
                            </span>
                        @endif
                        <span class="pbmit-rpw-title d-block" style="font-size: 0.9rem; line-height: 1.4;">
                            <a href="{{ route('events.show', $event->slug) }}">{{ Str::limit($event->title, 50) }}</a>
                        </span>
                        @if(!empty($event->location))
                            <span class="pbmit-rpw-location d-block mt-1" style="font-size: 0.8rem; color: #999;">
                                <i class="pbmit-base-icon-location-1"></i> {{ Str::limit($event->location, 30) }}
                            </span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </aside>
@endif
<!-- Upcoming Events Widget End -->
