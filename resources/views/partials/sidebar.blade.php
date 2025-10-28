<!-- Sidebar Component -->
@php
    // Get sidebar type (post, service, event)
    $sidebarType = $type ?? 'post';

    // Get sidebar settings from site settings
    $settingService = app(\App\Services\SettingService::class);
    $sidebarSettings = $settingService->get("sidebar_{$sidebarType}", []);

    // Default widgets if no settings configured
    if (empty($sidebarSettings)) {
        $sidebarSettings = [
            [
                'type' => 'recent_items',
                'title' => $sidebarType === 'post' ? 'Recent Posts' : ($sidebarType === 'event' ? 'Upcoming Events' : 'Our Services'),
                'enabled' => true,
                'count' => 5,
            ],
        ];

        // Add categories widget for posts only
        if ($sidebarType === 'post') {
            $sidebarSettings[] = [
                'type' => 'categories',
                'title' => 'Categories',
                'enabled' => true,
            ];
            $sidebarSettings[] = [
                'type' => 'tags',
                'title' => 'Popular Tags',
                'enabled' => true,
                'count' => 15,
            ];
        }
    }
@endphp

<aside class="sidebar {{ $sidebarType }}-sidebar">
    @if(!empty($sidebarSettings) && is_array($sidebarSettings))
        @foreach($sidebarSettings as $widget)
            @if(($widget['enabled'] ?? true))
                @php
                    $widgetType = $widget['type'] ?? 'recent_items';
                    $widgetTitle = $widget['title'] ?? '';
                    $widgetCount = $widget['count'] ?? 5;
                    $widgetData = $widget['data'] ?? [];
                @endphp

                @if($widgetType === 'search')
                    @include('partials.sidebar-widgets.search', [
                        'title' => $widgetTitle,
                    ])
                @elseif($widgetType === 'services_list')
                    @include('partials.sidebar-widgets.services-list', [
                        'title' => $widgetTitle,
                        'count' => $widgetCount,
                    ])
                @elseif($widgetType === 'recent_items')
                    @include('partials.sidebar-widgets.recent-items', [
                        'type' => $sidebarType,
                        'title' => $widgetTitle,
                        'count' => $widgetCount,
                    ])
                @elseif($widgetType === 'categories' && $sidebarType === 'post')
                    @include('partials.sidebar-widgets.categories', [
                        'title' => $widgetTitle,
                    ])
                @elseif($widgetType === 'tags' && $sidebarType === 'post')
                    @include('partials.sidebar-widgets.tags', [
                        'title' => $widgetTitle,
                        'count' => $widgetCount,
                    ])
                @elseif($widgetType === 'newsletter')
                    @include('partials.sidebar-widgets.newsletter', array_merge([
                        'title' => $widgetTitle,
                    ], $widgetData))
                @endif
            @endif
        @endforeach
    @endif
</aside>
<!-- Sidebar End -->
