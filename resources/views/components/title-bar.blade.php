{{-- Title Bar Component --}}
<div class="pbmit-title-bar-wrapper" style="background-image: url({{ $pageSettings['title_bar_bg_image'] ?? '' }});">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title">{{ $pageSettings['title_bar_title'] ?? $page->title ?? 'Page Title' }}</h1>
                    </div>
                </div>

                @if(($pageSettings['show_breadcrumbs'] ?? true))
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="Home" href="{{ url('/') }}" class="home">
                                <span>{{ $settings['general']['site_name'] ?? 'Home' }}</span>
                            </a>
                        </span>

                        @if(!empty($breadcrumbs))
                            @foreach($breadcrumbs as $crumb)
                            <span class="sep">
                                <i class="pbmit-base-icon-angle-right"></i>
                            </span>
                            <span>
                                @if(!empty($crumb['url']))
                                <a title="{{ $crumb['title'] }}" href="{{ $crumb['url'] }}">
                                    <span>{{ $crumb['title'] }}</span>
                                </a>
                                @else
                                <span class="post-root post post-post current-item">{{ $crumb['title'] }}</span>
                                @endif
                            </span>
                            @endforeach
                        @else
                            <span class="sep">
                                <i class="pbmit-base-icon-angle-right"></i>
                            </span>
                            <span>
                                <span class="post-root post post-post current-item">{{ $pageSettings['title_bar_title'] ?? $page->title ?? '' }}</span>
                            </span>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
