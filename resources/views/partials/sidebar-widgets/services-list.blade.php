<!-- Services List Widget -->
@php
    $widgetTitle = $title ?? 'Our Services';
    $widgetCount = $count ?? 6;

    $services = \App\Models\Service::where('status', \App\Enums\ContentStatus::PUBLISHED)
        ->orderBy('created_at', 'desc')
        ->take($widgetCount)
        ->get();
@endphp

@if($services->isNotEmpty())
    <aside class="widget post-list">
        <h2 class="widget-title">{{ $widgetTitle }}</h2>
        <div class="all-post-list">
            <ul>
                @foreach($services as $service)
                    <li>
                        <a href="{{ route('services.show', $service->slug) }}">
                            {{ $service->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
@endif
<!-- Services List Widget End -->
