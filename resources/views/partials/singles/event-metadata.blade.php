<!-- Event Metadata Section -->
@if(!empty($event->featured_image))
    <div class="event-featured-image mb-4">
        <img
            src="{{ asset('storage/' . $event->featured_image) }}"
            alt="{{ $event->title }}"
            class="img-fluid w-100 rounded"
        >
    </div>
@endif

<div class="event-info-box mb-4 p-4 bg-light rounded">
    <h5 class="h6 mb-3 text-uppercase fw-bold">Event Details</h5>
    <div class="row g-3">
        @if($event->start_date)
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="far fa-calendar text-primary me-2"></i>
                    <div>
                        <small class="text-muted d-block">Start Date</small>
                        <strong>{{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y - H:i') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        @if($event->end_date)
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="far fa-calendar-check text-primary me-2"></i>
                    <div>
                        <small class="text-muted d-block">End Date</small>
                        <strong>{{ \Carbon\Carbon::parse($event->end_date)->format('F d, Y - H:i') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($event->location))
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                    <div>
                        <small class="text-muted d-block">Location</small>
                        <strong>{{ $event->location }}</strong>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($event->max_attendees))
            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="fas fa-users text-primary me-2"></i>
                    <div>
                        <small class="text-muted d-block">Max Attendees</small>
                        <strong>{{ $event->max_attendees }} people</strong>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @php
        $now = now();
        $startDate = \Carbon\Carbon::parse($event->start_date);
        $endDate = \Carbon\Carbon::parse($event->end_date);

        if ($now < $startDate) {
            $status = 'upcoming';
            $statusText = 'Upcoming';
            $statusClass = 'bg-info';
        } elseif ($now >= $startDate && $now <= $endDate) {
            $status = 'ongoing';
            $statusText = 'Ongoing';
            $statusClass = 'bg-success';
        } else {
            $status = 'past';
            $statusText = 'Past Event';
            $statusClass = 'bg-secondary';
        }
    @endphp

    <div class="mt-3">
        <span class="badge {{ $statusClass }} text-white">
            {{ $statusText }}
        </span>
    </div>
</div>

@if(!empty($event->description))
    <div class="event-description lead text-muted mb-4">
        <p>{{ $event->description }}</p>
    </div>
@endif
<!-- Event Metadata End -->
