{{-- Client Testimonials Section --}}
<section class="testimonials-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2>{{ $settings['content_data']['testimonials_title'] ?? 'What Our Clients Say' }}</h2>
                <p>{{ $settings['content_data']['testimonials_subtitle'] ?? 'Hear from our satisfied customers' }}</p>
            </div>
        </div>
        <div class="row">
            @if(isset($settings['content_data']['testimonials']) && is_array($settings['content_data']['testimonials']))
                @foreach($settings['content_data']['testimonials'] as $testimonial)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <p>"{{ $testimonial['content'] ?? 'Great service and professional team.' }}"</p>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h5>{{ $testimonial['name'] ?? 'Client Name' }}</h5>
                                    <span>{{ $testimonial['position'] ?? 'Position' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Default testimonials if none configured --}}
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"Executive delivered exceptional design services. Highly recommended!"</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h5>Sarah Johnson</h5>
                                <span>Homeowner</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>