@extends('layouts.app')

@section('content')
    @include('components.header', ['style' => $headerStyle ?? 3])
    @include('components.title-bar', ['title' => $model->title])

    <div class="page-content">
        <article>
            @if($model->featured_image)
                <img src="{{ $model->featured_image }}" alt="{{ $model->title }}" class="featured-image">
            @endif

            @include('frontend.page-builder', ['blocks' => $model->content ?? []])
        </article>

        @if($type === 'post' && $model instanceof \App\Models\Post)
            <div class="post-meta">
                @if($model->author)
                    <span class="author">By {{ $model->author->name }}</span>
                @endif
                @if($model->published_at)
                    <span class="date">{{ $model->published_at->format('F j, Y') }}</span>
                @endif
            </div>

            @if($model->categories->count() > 0)
                <div class="categories">
                    @foreach($model->categories as $category)
                        <a href="{{ route('category.show', $category) }}" class="category">{{ $category->name }}</a>
                    @endforeach
                </div>
            @endif

            @include('components.comments', ['post' => $model])
        @endif
    </div>

    @include('components.footer', ['style' => $footerStyle ?? 3])
@endsection
