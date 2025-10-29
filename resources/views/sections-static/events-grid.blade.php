@php
    use App\Models\Event;
    use App\Enums\ContentStatus;

    // Get block settings
    $title = $block['data']['title'] ?? null;
    $columns = $block['data']['columns'] ?? 3;

    // Get all published events
    $events = Event::where('status', ContentStatus::PUBLISHED)
        ->orderBy('start_date', 'desc')
        ->get();
@endphp

<!-- Events Grid Section -->
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
            @forelse($events as $event)
                <article class="pbmit-ele-blog pbmit-blog-style-1 col-md-{{ 12 / $columns }}">
                    <div class="post-item">
                        <div class="pbminfotech-box-content">
                            <div class="pbmit-featured-container">
                                @if($event->featured_image)
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="{{ Storage::url($event->featured_image) }}" class="img-fluid" alt="{{ $event->title }}">
                                        </div>
                                    </div>
                                @endif
                                <a class="pbmit-blog-btn" href="{{ route('events.show', $event->slug) }}" title="{{ $event->title }}">
                                    <span class="pbmit-button-icon">
                                        <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                                    </span>
                                </a>
                                <a class="pbmit-link" href="{{ route('events.show', $event->slug) }}"></a>
                            </div>
                            <div class="pbmit-content-wrapper">
                                <div class="pbmit-date-wraper d-flex align-items-center">
                                    <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                        <div class="pbmit-meta-date">
                                            <span class="pbmit-post-date">
                                                <i class="pbmit-base-icon-calendar-3"></i>{{ $event->start_date->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    @if($event->location)
                                        <div class="pbmit-meta-author pbmit-meta-line">
                                            <span class="pbmit-post-author">
                                                <i class="pbmit-base-icon-map-marker"></i>{{ Str::limit($event->location, 30) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="pbmit-post-title">
                                    <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
                                </h3>
                                @if($event->description)
                                    <div class="pbminfotech-box-desc">
                                        {{ Str::limit($event->description, 120) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-12">
                    <p class="text-center">No events available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Events Grid End -->
