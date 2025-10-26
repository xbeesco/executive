{{-- Event Single Content --}}

<section class="section-md">
    <div class="container">
        <article class="event-single">
            {{-- Featured Image --}}
            @if($event->featured_image)
            <div class="event-featured-image">
                <img src="{{ $event->featured_image }}" alt="{{ $event->title }}" class="img-fluid">
            </div>
            @endif

            {{-- Event Meta Info --}}
            <div class="event-meta">
                <div class="event-info-box">
                    <div class="info-item">
                        <i class="pbmit-base-icon-calendar-3"></i>
                        <strong>Start Date:</strong>
                        {{ $event->start_date->format('M d, Y - H:i') }}
                    </div>

                    @if($event->end_date)
                    <div class="info-item">
                        <i class="pbmit-base-icon-calendar-3"></i>
                        <strong>End Date:</strong>
                        {{ $event->end_date->format('M d, Y - H:i') }}
                    </div>
                    @endif

                    @if($event->location)
                    <div class="info-item">
                        <i class="pbmit-base-icon-location"></i>
                        <strong>Location:</strong>
                        {{ $event->location }}
                    </div>
                    @endif

                    @if($event->max_attendees)
                    <div class="info-item">
                        <i class="pbmit-base-icon-users"></i>
                        <strong>Max Attendees:</strong>
                        {{ $event->max_attendees }}
                    </div>
                    @endif
                </div>
            </div>

            {{-- Event Description --}}
            @if($event->description)
            <div class="event-description">
                <p class="lead">{{ $event->description }}</p>
            </div>
            @endif

            {{-- Event Content --}}
            <div class="event-content">
                @include('partials.page-builder', ['blocks' => $event->content ?? []])
            </div>

            {{-- Event Status Badge --}}
            <div class="event-status mt-4">
                @if($event->start_date->isFuture())
                    <span class="badge badge-info">Upcoming Event</span>
                @elseif($event->start_date->isPast() && ($event->end_date ? $event->end_date->isFuture() : false))
                    <span class="badge badge-success">Ongoing Event</span>
                @else
                    <span class="badge badge-secondary">Past Event</span>
                @endif
            </div>
        </article>
    </div>
</section>
