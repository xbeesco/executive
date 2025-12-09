@php
    use App\Models\Post;
    use App\Models\Event;
    use App\Models\Service;
    use App\Models\Category;
    use App\Enums\ContentStatus;

    // Get block settings
    $contentType = $block['data']['content_type'] ?? 'posts';
    $title = $block['data']['title'] ?? null;
    $columns = $block['data']['columns'] ?? 3;
    $showSortable = ($block['data']['show_sortable'] ?? true) && $contentType === 'posts';

    // Prepare content variables based on type
    $items = collect();
    $titleField = 'title';
    $dateField = 'created_at';
    $descField = 'excerpt';
    $categories = collect();
    $routeName = '';

    if ($contentType === 'posts') {
        $items = Post::with(['categories'])
            ->where('status', ContentStatus::PUBLISHED)
            ->orderBy('published_at', 'desc')
            ->get();
        $dateField = 'published_at';
        $descField = 'excerpt';
        $routeName = 'posts.show';

        $categories = Category::whereHas('posts', function($query) {
            $query->where('status', ContentStatus::PUBLISHED);
        })->get();
    } elseif ($contentType === 'events') {
        $items = Event::where('status', ContentStatus::PUBLISHED)
            ->orderBy('start_date', 'desc')
            ->get();
        $dateField = 'start_date';
        $descField = 'description';
        $routeName = 'events.show';
    } elseif ($contentType === 'services') {
        $items = Service::where('status', ContentStatus::PUBLISHED)
            ->latest()
            ->get();
        $descField = 'excerpt';
        $routeName = 'services.show';
    }
@endphp

<!-- Dynamic Content Grid Section -->
<section class="section-md {{ $showSortable ? 'pbmit-sortable-yes' : '' }}">
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

        @if($showSortable && $categories->isNotEmpty())
            <div class="pbmit-sortable-list">
                <ul class="pbmit-sortable-list-ul">
                    <li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
                    @foreach($categories as $category)
                        <li>
                            <a href="#" class="pbmit-sortable-link" data-sortby="{{ Str::slug($category->name) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="pbmit-element-posts-wrapper row multi-columns-row">
            @forelse($items as $item)
                @php
                    // Get category classes for posts
                    $categoryClasses = '';
                    if ($contentType === 'posts' && method_exists($item, 'categories')) {
                        $categoryClasses = $item->categories->pluck('name')->map(fn($name) => Str::slug($name))->implode(' ');
                    }

                    // Unified date display
                    $displayDate = '';
                    if ($dateField === 'published_at' && $item->published_at) {
                        $displayDate = $item->published_at->format('M d, Y');
                    } elseif ($dateField === 'start_date' && isset($item->start_date)) {
                        $displayDate = $item->start_date->format('M d, Y');
                    } else {
                        $displayDate = $item->created_at->format('M d, Y');
                    }

                    // Unified description
                    $description = $item->$descField ?? '';
                @endphp

                <article class="pbmit-ele pbmit-ele-blog pbmit-blog-style-1 {{ $categoryClasses }} col-md-{{ 12 / $columns }}">
                    <div class="post-item">
                        <div class="pbminfotech-box-content">
                            <div class="pbmit-featured-container">
                                @if($item->featured_image)
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="{{ Storage::url($item->featured_image) }}" class="img-fluid" alt="{{ $item->title }}">
                                        </div>
                                    </div>
                                @endif
                                @if($item->icon && $contentType === 'services')
                                    <div class="pbmit-service-icon-overlay">
                                        <i class="{{ icon_class($item->icon) }}"></i>
                                    </div>
                                @endif
                                <a class="pbmit-blog-btn" href="{{ route($routeName, $item->slug) }}" title="{{ $item->title }}">
                                    <span class="pbmit-button-icon">
                                        <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                                    </span>
                                </a>
                                <a class="pbmit-link" href="{{ route($routeName, $item->slug) }}"></a>
                            </div>
                            <div class="pbmit-content-wrapper">
                                <div class="pbmit-date-wraper d-flex align-items-center">
                                    @if($contentType !== 'services')
                                        <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                            <div class="pbmit-meta-date">
                                                <span class="pbmit-post-date">
                                                    <i class="pbmit-base-icon-calendar-3"></i>{{ $displayDate }}
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($contentType === 'events' && !empty($item->location))
                                        <div class="pbmit-meta-author pbmit-meta-line">
                                            <span class="pbmit-post-author">
                                                <i class="pbmit-base-icon-map-marker"></i>{{ Str::limit($item->location, 30) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="pbmit-post-title">
                                    <a href="{{ route($routeName, $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                                @if($description)
                                    <div class="pbminfotech-box-desc">
                                        {{ Str::limit($description, 120) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-12">
                    <p class="text-center">No {{ $contentType }} available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Dynamic Content Grid End -->
