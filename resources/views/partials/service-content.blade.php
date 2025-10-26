{{-- Service Single Content --}}

<section class="section-md">
    <div class="container">
        <article class="service-single">
            {{-- Featured Image --}}
            @if($service->featured_image)
            <div class="service-featured-image">
                <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" class="img-fluid">
            </div>
            @endif

            {{-- Service Icon & Title --}}
            @if($service->icon)
            <div class="service-icon">
                <i class="{{ $service->icon }}"></i>
            </div>
            @endif

            {{-- Service Excerpt --}}
            @if($service->excerpt)
            <div class="service-excerpt">
                <p class="lead">{{ $service->excerpt }}</p>
            </div>
            @endif

            {{-- Service Content --}}
            <div class="service-content">
                @include('partials.page-builder', ['blocks' => $service->content ?? []])
            </div>

            {{-- Service Features --}}
            @if($service->features && count($service->features) > 0)
            <div class="service-features mt-5">
                <h3>Key Features</h3>
                <ul class="features-list">
                    @foreach($service->features as $feature)
                        <li>
                            @if(isset($feature['icon']))
                                <i class="{{ $feature['icon'] }}"></i>
                            @endif
                            {{ $feature['name'] ?? $feature }}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </article>
    </div>
</section>
