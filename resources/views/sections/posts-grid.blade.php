@php
    use App\Models\Post;
    use App\Models\Category;
    use App\Enums\ContentStatus;

    // Get block settings
    $title = $block['data']['title'] ?? null;
    $columns = $block['data']['columns'] ?? 3;
    $showSortable = $block['data']['show_sortable'] ?? true;

    // Get all published posts with their categories
    $posts = Post::with(['categories'])
        ->where('status', ContentStatus::PUBLISHED)
        ->orderBy('published_at', 'desc')
        ->get();

    // Get all categories that have posts
    $categories = Category::whereHas('posts', function($query) {
        $query->where('status', ContentStatus::PUBLISHED);
    })->get();
@endphp

<!-- Posts Grid Section -->
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
            @forelse($posts as $post)
                @php
                    // Get category slugs for this post
                    $categoryClasses = $post->categories->pluck('name')->map(fn($name) => Str::slug($name))->implode(' ');
                @endphp
                <article class="pbmit-ele pbmit-ele-blog pbmit-blog-style-1 {{ $categoryClasses }} col-md-{{ 12 / $columns }}">
                    <div class="post-item">
                        <div class="pbminfotech-box-content">
                            <div class="pbmit-featured-container">
                                @if($post->featured_image)
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <img src="{{ Storage::url($post->featured_image) }}" class="img-fluid" alt="{{ $post->title }}">
                                        </div>
                                    </div>
                                @endif
                                <a class="pbmit-blog-btn" href="{{ route('posts.show', $post->slug) }}" title="{{ $post->title }}">
                                    <span class="pbmit-button-icon">
                                        <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                                    </span>
                                </a>
                                <a class="pbmit-link" href="{{ route('posts.show', $post->slug) }}"></a>
                            </div>
                            <div class="pbmit-content-wrapper">
                                <div class="pbmit-date-wraper d-flex align-items-center">
                                    <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                        <div class="pbmit-meta-date">
                                            <span class="pbmit-post-date">
                                                <i class="pbmit-base-icon-calendar-3"></i>{{ $post->published_at?->format('M d, Y') ?? $post->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="pbmit-post-title">
                                    <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                @if($post->excerpt)
                                    <div class="pbminfotech-box-desc">
                                        {{ Str::limit($post->excerpt, 120) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-12">
                    <p class="text-center">No posts available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Posts Grid End -->
