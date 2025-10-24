<section class="title-bar">
    <div class="container">
        <h1 class="page-title">{{ $title ?? '' }}</h1>
        @if($breadcrumbs ?? null)
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    @foreach($breadcrumbs as $breadcrumb)
                        <li @if($loop->last)class="active"@endif>
                            @if($loop->last)
                                {{ $breadcrumb['label'] ?? '' }}
                            @else
                                <a href="{{ $breadcrumb['url'] ?? '#' }}">{{ $breadcrumb['label'] ?? '' }}</a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        @endif
    </div>
</section>
