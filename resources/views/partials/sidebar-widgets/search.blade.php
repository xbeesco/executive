<!-- Search Widget -->
<aside class="widget widget-search">
    <h2 class="widget-title">{{ $title ?? 'Search' }}</h2>
    <form class="search-form" action="{{ route('search') }}" method="GET">
        <input type="search" class="search-field" placeholder="Search …" value="{{ request('q') }}" name="q">
        <button type="submit" class="search-submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</aside>
<!-- Search Widget End -->
