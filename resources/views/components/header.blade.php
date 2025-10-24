<header class="header header-style-{{ $style ?? 3 }}">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ route('home') }}" class="logo">
                    {{ config('app.name') }}
                </a>
            </div>
            <div class="navbar-menu">
                @php
                    $menu = \App\Services\SettingService::getMenu();
                @endphp
                @if($menu)
                    <ul class="navbar-items">
                        @foreach($menu as $item)
                            <li class="navbar-item">
                                <a href="{{ $item['url'] ?? '#' }}" class="navbar-link">
                                    {{ $item['label'] ?? '' }}
                                </a>
                                @if($item['children'] ?? null)
                                    <ul class="navbar-submenu">
                                        @foreach($item['children'] as $child)
                                            <li>
                                                <a href="{{ $child['url'] ?? '#' }}">{{ $child['label'] ?? '' }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
