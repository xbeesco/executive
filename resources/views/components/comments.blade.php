<section class="comments-section">
    <h2>Comments</h2>

    @forelse($post->comments as $comment)
        <article class="comment">
            <header class="comment-header">
                <h3 class="comment-author">{{ $comment->author_name }}</h3>
                <time class="comment-date">{{ $comment->created_at->format('F j, Y') }}</time>
            </header>
            <div class="comment-content">
                {!! nl2br(e($comment->content)) !!}
            </div>

            @if($comment->replies->count() > 0)
                <div class="comment-replies">
                    @foreach($comment->replies as $reply)
                        <article class="comment comment-reply">
                            <header class="comment-header">
                                <h4 class="comment-author">{{ $reply->author_name }}</h4>
                                <time class="comment-date">{{ $reply->created_at->format('F j, Y') }}</time>
                            </header>
                            <div class="comment-content">
                                {!! nl2br(e($reply->content)) !!}
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </article>
    @empty
        <p>No comments yet. Be the first to comment!</p>
    @endforelse

    <div class="comment-form">
        <h3>Leave a Comment</h3>
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="author_name">Name *</label>
                <input type="text" id="author_name" name="author_name" required>
                @error('author_name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="author_email">Email *</label>
                <input type="email" id="author_email" name="author_email" required>
                @error('author_email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="author_website">Website</label>
                <input type="url" id="author_website" name="author_website">
                @error('author_website')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Comment *</label>
                <textarea id="content" name="content" rows="5" required></textarea>
                @error('content')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>
</section>
