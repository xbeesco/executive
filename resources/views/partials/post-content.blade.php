{{-- Blog Details (Following Original HTML Structure) --}}
<section class="site-content blog-details">
    <div class="container">
        <div class="row">
            {{-- Main Content Area --}}
            <div class="col-lg-9 blog-right-col">
                <div class="row">
                    <div class="col-md-12">
                        <article>
                            <div class="post blog-classic">
                                {{-- Page Builder Blocks Go Here --}}
                                @include('partials.page-builder', ['blocks' => $post->content ?? []])
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-md-12 col-lg-3 blog-left-col">
                @include('partials.sidebar', ['type' => 'post'])
            </div>
        </div>
    </div>
</section>
