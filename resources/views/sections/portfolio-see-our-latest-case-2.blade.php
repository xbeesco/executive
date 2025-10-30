@php
    // Extract block data
    $data = $block['data'] ?? [];
    $title = $data['title'] ?? 'Explore Our Executive Workspace Portfolio';
    $showSortable = $data['show_sortable'] ?? true;
    $columns = $data['columns'] ?? '4';
    $categories = $data['categories'] ?? [];
    $items = $data['items'] ?? [];

    // Determine column class based on columns setting
    $colClass = 'col-md-' . $columns;
@endphp

<section class="px-xl-4 px-2 {{ $showSortable ? 'pbmit-sortable-yes' : '' }}">
    <div class="container-fluid">
        <div class="pf-six-header-area pbmit-bg-color-blackish">
            <div class="pbmit-heading-subheading text-center animation-style4">
                <h2 class="pbmit-title">{{ $title }}</h2>
            </div>

            @if($showSortable && !empty($categories))
                @php
                    $categoriesModels = \App\Models\Category::whereIn('slug', $categories)->get();
                @endphp
                <div class="pbmit-sortable-list">
                    <ul class="pbmit-sortable-list-ul">
                        <li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
                        @foreach($categoriesModels as $category)
                            <li>
                                <a href="#" class="pbmit-sortable-link" data-sortby="{{ $category->slug }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="pbmit-element-posts-wrapper row g-0 pbmit-column-three">
            @foreach($items as $index => $item)
                @php
                    $itemImage = $item['image'] ?? null;
                    $itemCategory = $item['category'] ?? '';
                    $categoryModel = $itemCategory ? \App\Models\Category::where('slug', $itemCategory)->first() : null;
                    $itemTitle = $item['title'] ?? '';
                    $itemLink = $item['link'] ?? '#';
                    $buttonIcon = $item['button_icon'] ?? 'pbmit-base-icon-pbmit-up-arrow';

                    // Fallback image based on loop iteration
                    $imageNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    $fallbackImage = "https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-{$imageNumber}.jpg";
                @endphp

                <article class="pbmit-ele pbmit-portfolio-style-5 {{ $itemCategory }} {{ $colClass }}">
                    <div class="pbminfotech-post-content">
                        <div class="pbmit-featured-img-wrapper">
                            <div class="pbmit-featured-wrapper">
                                <img src="{{ image($itemImage ?? $fallbackImage, 'section_image') }}" class="img-fluid" alt="{{ $itemTitle }}">
                            </div>
                        </div>
                        <div class="pbminfotech-box-content">
                            <div class="pbminfotech-titlebox">
                                @if($categoryModel)
                                <div class="pbmit-port-cat">
                                    <a href="#" rel="tag">{{ $categoryModel->name }}</a>
                                </div>
                                @endif
                                <h3 class="pbmit-portfolio-title">
                                    <a href="{{ $itemLink }}">{{ $itemTitle }}</a>
                                </h3>
                            </div>
                            <div class="pbmit-portfolio-btn">
                                <a href="{{ $itemLink }}">
                                    <i class="{{ $buttonIcon }}"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
