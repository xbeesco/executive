<!-- Service Metadata Section -->
<div class="service-header mb-4">
    @if(!empty($service->icon))
        <div class="service-icon mb-3">
            <i class="{{ $service->icon }} fa-3x text-primary"></i>
        </div>
    @endif

    @if(!empty($service->featured_image))
        <div class="service-featured-image mb-4">
            <img
                src="{{ asset('storage/' . $service->featured_image) }}"
                alt="{{ $service->title }}"
                class="img-fluid w-100 rounded"
            >
        </div>
    @endif

    @if(!empty($service->excerpt))
        <div class="service-excerpt lead text-muted mb-4">
            <p>{{ $service->excerpt }}</p>
        </div>
    @endif
</div>

@if(!empty($service->features) && is_array($service->features))
    <div class="service-features mb-4">
        <h4 class="h5 mb-3">Key Features</h4>
        <div class="row g-3">
            @foreach($service->features as $feature)
                <div class="col-md-6">
                    <div class="feature-item d-flex align-items-start p-3 border rounded">
                        @if(!empty($feature['icon']))
                            <div class="feature-icon me-3">
                                <i class="{{ $feature['icon'] }} fa-2x text-primary"></i>
                            </div>
                        @endif
                        <div class="feature-content">
                            @if(!empty($feature['title']))
                                <h5 class="h6 mb-2">{{ $feature['title'] }}</h5>
                            @endif
                            @if(!empty($feature['description']))
                                <p class="small text-muted mb-0">{{ $feature['description'] }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<!-- Service Metadata End -->
