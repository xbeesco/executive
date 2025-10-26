{{-- Post Single Content --}}

<section class="section-md">
    <div class="container">
        <article class="post-single">
            {{-- Featured Image --}}
            @if($post->featured_image)
            <div class="post-featured-image">
                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="img-fluid">
            </div>
            @endif

            {{-- Post Meta --}}
            <div class="post-meta">
                @if($post->published_at)
                <span class="post-date">
                    <i class="pbmit-base-icon-calendar-3"></i>
                    {{ $post->published_at->format('M d, Y') }}
                </span>
                @endif

                @if($post->author)
                <span class="post-author">
                    <i class="pbmit-base-icon-user-3"></i>
                    By {{ $post->author->name }}
                </span>
                @endif

                @if($post->categories->count() > 0)
                <span class="post-categories">
                    <i class="pbmit-base-icon-folder"></i>
                    @foreach($post->categories as $category)
                        <a href="#">{{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </span>
                @endif
            </div>

            {{-- Post Content --}}
            <div class="post-content">
                @include('partials.page-builder', ['blocks' => $post->content ?? []])
            </div>

            {{-- Tags --}}
            @if($post->tags->count() > 0)
            <div class="post-tags">
                <strong>Tags:</strong>
                @foreach($post->tags as $tag)
                    <a href="#" class="tag">{{ $tag->name }}</a>
                @endforeach
            </div>
            @endif

            {{-- Comments Section --}}
            @if($post->comments->count() > 0)
            <div class="post-comments mt-5">
                <h3>Comments ({{ $post->comments->count() }})</h3>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="comment-author">
                            <strong>{{ $comment->author_name }}</strong>
                            <span class="comment-date">{{ $comment->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="comment-content">
                            {{ $comment->content }}
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </article>
    </div>
</section>
