{{-- Sidebar Component --}}
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
                'data' => [
                    'title' => $sidebarType === 'post' ? 'Recent Posts' : ($sidebarType === 'event' ? 'Upcoming Events' : 'Our Services'),
                    'count' => 5,
                ],
            ],
        ];

        // Add categories widget for posts only
        if ($sidebarType === 'post') {
            $sidebarSettings[] = [
                'type' => 'categories',
                'data' => [
                    'title' => 'Categories',
                ],
            ];
            $sidebarSettings[] = [
                'type' => 'tags',
                'data' => [
                    'title' => 'Popular Tags',
                    'count' => 15,
                ],
            ];
        }
    }
@endphp

<aside class="sidebar {{ $sidebarType }}-sidebar service-sidebar">
    @if(!empty($sidebarSettings) && is_array($sidebarSettings))
        @foreach($sidebarSettings as $widget)
            @php
                // Builder format: each widget is a block with 'type' and 'data'
                $widgetType = $widget['type'] ?? 'recent_items';
                $widgetData = $widget['data'] ?? [];

                // Extract common fields from data
                $widgetTitle = $widgetData['title'] ?? '';
                $widgetCount = $widgetData['count'] ?? 5;
            @endphp

            @if($widgetType === 'services_list')
                @include('sidebars.widgets.services-list', [
                    'title' => $widgetTitle,
                    'count' => $widgetCount,
                ])
            @elseif($widgetType === 'recent_items')
                @include('sidebars.widgets.recent-items', [
                    'type' => $sidebarType,
                    'title' => $widgetTitle,
                    'count' => $widgetCount,
                ])
            @elseif($widgetType === 'categories' && $sidebarType === 'post')
                @include('sidebars.widgets.categories', [
                    'title' => $widgetTitle,
                ])
            @elseif($widgetType === 'tags' && $sidebarType === 'post')
                @include('sidebars.widgets.tags', [
                    'title' => $widgetTitle,
                    'count' => $widgetCount,
                ])
            @elseif($widgetType === 'call_to_action')
                @include('sidebars.widgets.call-to-action', $widgetData)
            @elseif($widgetType === 'events_upcoming')
                @include('sidebars.widgets.events-upcoming', [
                    'title' => $widgetTitle,
                    'count' => $widgetCount,
                    'event_type' => $widgetData['event_type'] ?? 'upcoming',
                ])
            @elseif($widgetType === 'download')
                @include('sidebars.widgets.download', $widgetData)
            @endif
        @endforeach
    @endif
</aside>
