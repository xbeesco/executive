@php
    use App\Models\Post;
    use App\Models\Event;
    use App\Models\Service;
    use App\Enums\ContentStatus;

    // Get block settings
    $title = $block['data']['title'] ?? null;
    $columns = $block['data']['columns'] ?? 3;
    $contentType = $block['data']['content_type'] ?? 'events';

    // Get content based on type
    switch ($contentType) {
        case 'posts':
            $items = Post::where('status', ContentStatus::PUBLISHED)
                ->with('author')
                ->orderBy('published_at', 'desc')
                ->get();
            break;
        case 'services':
            $items = Service::where('status', ContentStatus::PUBLISHED)
                ->orderBy('created_at', 'desc')
                ->get();
            break;
        case 'events':
        default:
            $items = Event::where('status', ContentStatus::PUBLISHED)
                ->orderBy('start_date', 'desc')
                ->get();
            break;
    }

    // Normalize data for unified display
    $normalizedItems = $items->map(function ($item) use ($contentType) {
        $routeName = match ($contentType) {
            'posts' => 'posts.show',
            'events' => 'events.show',
            'services' => 'services.show',
            default => 'posts.show',
        };

        return [
            'id' => $item->id,
            'title' => $item->title,
            'slug' => $item->slug,
            'excerpt' => $item->excerpt ?? $item->description ?? null,
            'featured_image' => $item->featured_image,
            'route' => route($routeName, $item->slug),
            'meta' => match ($contentType) {
                'posts' => [
                    'icon' => 'pbmit-base-icon-calendar-3',
                    'primary' => $item->published_at?->format('M d, Y') ?? $item->created_at->format('M d, Y'),
                    'secondary_icon' => 'pbmit-base-icon-user',
                    'secondary' => $item->author?->name ?? 'Admin',
                ],
                'events' => [
                    'icon' => 'pbmit-base-icon-calendar-3',
                    'primary' => $item->start_date->format('M d, Y'),
                    'secondary_icon' => 'pbmit-base-icon-map-marker',
                    'secondary' => $item->location ? Str::limit($item->location, 30) : null,
                ],
                'services' => [
                    'icon' => $item->icon ?? 'pbmit-xinterio-icon-tools',
                    'primary' => null,
                    'secondary_icon' => null,
                    'secondary' => null,
                ],
            },
        ];
    });
@endphp

<!-- Dynamic Content Grid Section -->
<section class="section-md pbmit-element-viewtype-masonry">
    <div class="container">
        @if($title)
            <div class="row">
                <div class="col-12">
                    <div class="pbmit-heading-subheading text-center mb-5">
                        <h2 class="pbmit-title">{{ $title }}</h2>
                    </div>
                </div>
            </div>
        @endif

        <div class="row pbmit-element-posts-wrapper">
            @forelse($normalizedItems as $item)
                <article class="pbmit-ele-blog pbmit-blog-style-1 col-md-{{ 12 / $columns }}">
                    <div class="post-item">
                        <div class="pbminfotech-box-content">
                            <div class="pbmit-featured-container">
                                @if($item['featured_image'])
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="{{ Storage::url($item['featured_image']) }}" class="img-fluid" alt="{{ $item['title'] }}">
                                        </div>
                                    </div>
                                @endif
                                <a class="pbmit-blog-btn" href="{{ $item['route'] }}" title="{{ $item['title'] }}">
                                    <span class="pbmit-button-icon">
                                        <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                                    </span>
                                </a>
                                <a class="pbmit-link" href="{{ $item['route'] }}"></a>
                            </div>
                            <div class="pbmit-content-wrapper">
                                @if($item['meta']['primary'] || $item['meta']['secondary'])
                                    <div class="pbmit-date-wraper d-flex align-items-center">
                                        @if($item['meta']['primary'])
                                            <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                                <div class="pbmit-meta-date">
                                                    <span class="pbmit-post-date">
                                                        <i class="{{ icon_class($item['meta']['icon']) }}"></i>{{ $item['meta']['primary'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($item['meta']['secondary'])
                                            <div class="pbmit-meta-author pbmit-meta-line">
                                                <span class="pbmit-post-author">
                                                    <i class="{{ icon_class($item['meta']['secondary_icon']) }}"></i>{{ $item['meta']['secondary'] }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                <h3 class="pbmit-post-title">
                                    <a href="{{ $item['route'] }}">{{ $item['title'] }}</a>
                                </h3>
                                @if($item['excerpt'])
                                    <div class="pbminfotech-box-desc">
                                        {{ Str::limit($item['excerpt'], 120) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-12">
                    <p class="text-center">No content available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Dynamic Content Grid End -->
