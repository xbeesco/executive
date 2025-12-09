<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Page;
use Illuminate\Database\Seeder;

class ComprehensiveBlocksSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // BATCH 1: Content Blocks (10 blocks)
        // ============================================
        $batch1 = [
            [
                'type' => 'content_text',
                'data' => [
                    'content' => '<p>Welcome to <strong>Executive Workspace</strong> - where distinguished professionals find their ideal work environment. Our spaces are designed with <em>meticulous attention to detail</em>, featuring premium furnishings and cutting-edge technology.</p><p>Experience the difference of working in an environment crafted for success.</p>',
                ],
            ],
            [
                'type' => 'text_content',
                'data' => [
                    'section_size' => 'section-xl',
                    'max_width' => 'full',
                    'content' => '<h2>Elevate Your Professional Presence</h2><p>At Executive Workspace, we understand that your environment reflects your success. Our curated workspaces blend sophisticated design with practical functionality, creating the perfect setting for business excellence.</p>',
                ],
            ],
            [
                'type' => 'content_image',
                'data' => [
                    'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/img01.jpg',
                    'alt_text' => 'Executive workspace interior',
                    'caption' => 'Premium workspace designed for success',
                    'alignment' => 'text-center',
                    'size' => 'w-100',
                ],
            ],
            [
                'type' => 'content_gallery',
                'data' => [
                    'images' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-01.jpg',
                            'alt_text' => 'Executive Suite',
                            'caption' => 'Private Office Suite',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg',
                            'alt_text' => 'Meeting Room',
                            'caption' => 'Boardroom Facility',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-03.jpg',
                            'alt_text' => 'Shared Workspace',
                            'caption' => 'Collaborative Space',
                        ],
                    ],
                    'columns' => '4',
                ],
            ],
            [
                'type' => 'content_list',
                'data' => [
                    'list_type' => 'unordered',
                    'list_style' => 'default',
                    'items' => [
                        ['text' => 'Premium workspace amenities included', 'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-check-mark'],
                        ['text' => 'Dedicated concierge service 24/7', 'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-check-mark'],
                        ['text' => 'Exclusive networking events monthly', 'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-check-mark'],
                        ['text' => 'Private boardroom access', 'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-check-mark'],
                    ],
                ],
            ],
            [
                'type' => 'content_quote',
                'data' => [
                    'content' => 'Excellence is not a destination, it is a continuous journey that never ends. In our executive spaces, that journey is supported by world-class amenities.',
                    'author' => 'James Richardson',
                    'author_position' => 'CEO, Executive Workspace',
                ],
            ],
            [
                'type' => 'content_accordion',
                'data' => [
                    'items' => [
                        [
                            'title' => 'What workspace options are available?',
                            'icon' => 'pbmit-xinterio-icon-help',
                            'content' => '<p>We offer private offices, executive suites, shared workspaces, and premium boardrooms. All spaces are fully furnished with high-end amenities.</p>',
                        ],
                        [
                            'title' => 'What amenities are included?',
                            'icon' => 'pbmit-xinterio-icon-help',
                            'content' => '<p>All memberships include high-speed internet, concierge service, refreshments, printing facilities, and access to meeting rooms.</p>',
                        ],
                        [
                            'title' => 'Are there networking opportunities?',
                            'icon' => 'pbmit-xinterio-icon-help',
                            'content' => '<p>Yes! We host monthly networking events, executive seminars, and exclusive business mixers for our members.</p>',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'content_video',
                'data' => [
                    'video_type' => 'youtube',
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                    'title' => 'Tour Our Executive Workspace',
                    'caption' => 'Virtual walkthrough of our premium facilities',
                ],
            ],
            [
                'type' => 'content_divider',
                'data' => [
                    'style' => 'solid',
                    'color' => 'secondary',
                    'thickness' => 1,
                    'width' => 100,
                    'opacity' => 25,
                ],
            ],
            [
                'type' => 'spacer',
                'data' => [
                    'size' => 'section-xl',
                ],
            ],
        ];

        // ============================================
        // BATCH 2: Hero, Slider, About (8 blocks)
        // ============================================
        $batch2 = [
            [
                'type' => 'hero',
                'data' => [
                    'title' => 'Transforming ordinary offices into distinguished executive environments',
                    'description' => 'Since 2025, Executive Workspace has been dedicated to creating exceptional business environments that inspire success and reflect professional excellence. Our award-winning team specializes in crafting luxury workspaces tailored to the unique needs of business leaders and',
                    'accordion_items' => [
                        [
                            'number' => '01',
                            'title' => 'Innovation',
                            'content' => 'From initial strategic planning to the final executive details, every workspace transformation embodies cutting-edge innovation and superior craftsmanship designed to elevate business performance and inspire professional excellence.',
                        ],
                        [
                            'number' => '02',
                            'title' => 'Premium Excellence',
                            'content' => 'Our commitment to premium materials, meticulous attention to detail, and uncompromising standards ensures that every executive workspace reflects the highest level of luxury and professionalism that discerning business leaders demand.',
                        ],
                        [
                            'number' => '03',
                            'title' => 'Executive-Focused',
                            'content' => 'We understand that successful executives require environments that enhance productivity, reflect corporate prestige, and provide the perfect balance of functionality and sophistication for conducting high-level business operations.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'slider',
                'data' => [
                    'slides' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-living-room',
                            'title' => 'Premium Executive Offices',
                            'description' => 'Meticulously designed spaces that embody sophistication and professionalism.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-house',
                            'title' => 'Luxury Workspace Solutions',
                            'description' => 'Comprehensive business environments tailored for distinguished leaders.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-3d',
                            'title' => 'Elite Executive Network',
                            'description' => 'Join an exclusive community of visionary CEOs and industry leaders.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-brickwall-1',
                            'title' => 'Prime Business Districts',
                            'description' => 'Strategically located in prestigious financial and business centers.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Bespoke Business Services',
                            'description' => 'Tailored solutions designed for high-performing professionals.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'about',
                'data' => [
                    'subtitle' => 'Executive Wellness',
                    'title' => 'Start your balanced executive lifestyle today',
                    'content' => 'We understand that peak performance requires holistic well-being. Our workspace integrates comprehensive wellness amenities with business functionality, creating environments where health and productivity coexist harmoniously.',
                    'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/img01.jpg',
                    'image_2' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/img02.jpg',
                    'year' => '2015',
                    'features' => [
                        ['text' => 'Global Locations Across 25+ Cities'],
                        ['text' => '5,000+ Distinguished Members Served'],
                    ],
                ],
            ],
            [
                'type' => 'about_variation_2',
                'data' => [
                    'subtitle' => 'Since 2015',
                    'title' => 'Transforming business environments into executive sanctuaries',
                    'description' => 'We elevate professional spaces through meticulous design and premium amenities, creating distinguished environments where business excellence flourishes and executive presence commands attention.',
                    'left_image_1' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/frame-clock.png',
                    'left_image_2' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/home4-about-02.jpg',
                    'right_image_1' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/home4-about-01.jpg',
                    'right_image_2' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/lamp.png',
                    'signature_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/sign.png',
                    'features' => [
                        ['icon' => 'pbmit-xinterio-icon-tools', 'title' => 'Executive Suites'],
                        ['icon' => 'pbmit-xinterio-icon-hard-hat', 'title' => 'Meeting Rooms'],
                        ['icon' => 'pbmit-xinterio-icon-offer', 'title' => 'Private Offices'],
                        ['icon' => 'pbmit-xinterio-icon-house-design', 'title' => 'Event Spaces'],
                    ],
                ],
            ],
            [
                'type' => 'about_variation_3',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-1/about-mask-img.jpg',
                    'left_icon' => 'pbmit-xinterio-icon-award',
                    'left_title' => 'Award-Winning <br>Excellence',
                    'subtitle' => 'Since 2015',
                    'title' => 'We architect premium, executive-caliber environments.',
                    'description' => 'Our design philosophy combines sophisticated aesthetics with strategic functionality, creating distinguished workspaces where executive productivity meets uncompromising luxury and professional excellence thrives.',
                    'icon_boxes' => [
                        ['icon' => 'pbmit-xinterio-icon-tools', 'title' => 'Executive Suites'],
                        ['icon' => 'pbmit-xinterio-icon-hard-hat', 'title' => 'Boardrooms'],
                        ['icon' => 'pbmit-xinterio-icon-offer', 'title' => 'Private Offices'],
                        ['icon' => 'pbmit-xinterio-icon-house-design', 'title' => 'Event Venues'],
                    ],
                    'signature_name' => 'A. El Sherbiny',
                    'signature_position' => 'Founder',
                    'signature_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-1/sign.png',
                ],
            ],
            [
                'type' => 'about_variation_4',
                'data' => [
                    'main_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/about-01.jpg',
                    'second_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/about-02.jpg',
                    'stat_number' => '25',
                    'stat_suffix' => '+',
                    'stat_title' => "Years of\nExcellence",
                    'subtitle' => 'Our Distinction',
                    'title' => 'Exceptional workspaces for exceptional leaders.',
                    'description' => 'We curate premium executive environments where sophisticated design meets cutting-edge technology, creating distinguished workspaces that elevate your professional presence and enhance organizational performance.',
                    'numbered_features' => [
                        ['number' => '01.', 'title' => 'Bespoke Luxury Workspace Solutions'],
                        ['number' => '02.', 'title' => 'Premium Materials and Expert Crafting'],
                    ],
                    'icon_boxes' => [
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/ihbox/icon-box-img-1.png', 'title' => 'Join our 5000+ satisfied client'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/ihbox/icon-box-img.png', 'title' => 'Award-Winning Executive Workspace Design'],
                    ],
                    'button_text' => 'More about',
                    'button_link' => '/about-us',
                ],
            ],
        ];

        // ============================================
        // BATCH 3: Services (10 blocks)
        // ============================================
        $batch3 = [
            [
                'type' => 'services',
                'data' => [
                    'subtitle' => 'Why Choose Executive?',
                    'title' => 'Crafting your workspace so inspiring, success becomes inevitable',
                    'content' => "Since 2015, we've been delivering premium workspace solutions tailored for discerning business leaders who demand excellence.",
                    'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/lamp.png',
                    'features' => [
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-living-room', 'title' => 'Smart Infrastructure', 'description' => 'Cutting-edge technology seamlessly integrated into every workspace.'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-office', 'title' => 'Bespoke Interiors', 'description' => 'Custom-designed spaces reflecting your corporate identity.'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-wardrobe', 'title' => 'Concierge Service', 'description' => 'Dedicated support for all your business needs.'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-house-design', 'title' => 'Premium Security', 'description' => '24/7 advanced security systems protecting your assets.'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-architect', 'title' => 'Flexible Memberships', 'description' => 'Scalable plans that grow with your business.'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-kitchen', 'title' => 'Excellence Guarantee', 'description' => 'Commitment to the highest standards of service.'],
                    ],
                ],
            ],
            [
                'type' => 'services_variation_2',
                'data' => [
                    'left_image_1' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/about-img-01.jpg',
                    'left_image_2' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/about-02.jpg',
                    'frame_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/frame-img.png',
                    'background_pattern' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/bg/about-pattern-bg.png',
                    'clock_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/clock.png',
                    'subtitle' => 'Our Excellence',
                    'title' => 'Premium Executive Workspace Solutions',
                    'description' => 'Every detail of our executive workspaces is meticulously crafted to elevate your business performance, inspire innovation, and reflect the prestige your leadership position demands in today\'s competitive landscape.',
                    'list_items' => [
                        ['text' => 'Dedicated concierge service exclusively for members'],
                        ['text' => 'Flexible membership plans with premium benefits included'],
                        ['text' => 'Sustainable luxury with eco-conscious design principles'],
                    ],
                    'icon_boxes' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-compass',
                            'title' => 'Elite Professional Network',
                            'description' => '3,500,000+ executives including 850,000+ entrepreneurs, 240,000+ industry leaders, and growing connections every day.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-kitchen',
                            'title' => 'World-Class Amenities',
                            'description' => '3,500,000+ satisfied members including 850,000+ CEOs, 240,000+ business strategists, and expanding globally every day.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_variation_3',
                'data' => [
                    'subtitle' => 'Welcome to Executive Excellence',
                    'title' => 'We craft sophisticated, executive spaces.',
                    'description' => 'We carefully curate all workspace environments, so you can rest assured that your business would receive the absolute highest quality of executive service. Premium amenities combined with professional excellence for discerning leaders.',
                    'button_text' => 'Discover More',
                    'button_link' => 'contact-us.html',
                    'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/about-img.webp',
                    'features' => [
                        [
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-axis',
                            'title' => 'Transparent Pricing',
                            'description' => 'We offer competitive and premium rates for our executive workspace solutions.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-brickwall-1',
                            'title' => 'Professional Team',
                            'description' => 'Our experienced staff delivers exceptional service for executive professionals.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-pantone',
                            'title' => 'Award Winning',
                            'description' => 'Recognized excellence in luxury workspace design and business hospitality.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-3d',
                            'title' => 'Latest Technologies',
                            'description' => 'State-of-the-art amenities and smart workspace solutions for modern executives.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_grid',
                'data' => [
                    'subtitle' => 'Since 2015',
                    'title' => 'Different needs, exceptional solutions.',
                    'description' => 'Tailored workspace solutions designed for every stage of your professional journey.',
                    'highlight_text' => 'Service',
                    'services' => [
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-01.jpg', 'number' => '01', 'category' => 'Private Office', 'title' => 'Executive Suites', 'link' => 'service-details.html', 'button_title' => 'Transforming Rooms'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg', 'number' => '02', 'category' => 'Boardrooms', 'title' => 'Meeting Sanctuaries', 'link' => 'service-details.html', 'button_title' => 'Weaving Dreams'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-03.jpg', 'number' => '03', 'category' => 'Event Space', 'title' => 'Corporate Pavilions', 'link' => 'service-details.html', 'button_title' => 'Interior Decorator'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-04.jpg', 'number' => '04', 'category' => 'Furniture', 'title' => 'Professional Interior', 'link' => 'service-details.html', 'button_title' => 'Professional Interior'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-05.jpg', 'number' => '05', 'category' => 'Kitchen', 'title' => 'Interior Work Plan', 'link' => 'service-details.html', 'button_title' => 'Interior Work Plan'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-06.jpg', 'number' => '06', 'category' => 'Bedroom', 'title' => '2D/3D Layouts', 'link' => 'service-details.html', 'button_title' => '2D/3D Layouts'],
                    ],
                ],
            ],
            [
                'type' => 'services_grid_variation_2',
                'data' => [
                    'subtitle' => 'Our Expertise',
                    'title' => 'Crafting environments for executive excellence.',
                    'counter_number' => '460',
                    'counter_suffix' => '+',
                    'counter_text' => 'Executive Workspace Solutions <br> Specialists at Your Service',
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/about-company-bg.png',
                    'services' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service/service-01.jpg',
                            'number' => '01',
                            'category' => 'Executive Suite',
                            'title' => 'Executive Office Design',
                            'description' => 'Premium workspace solutions for business leaders worldwide',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service/service-02.jpg',
                            'number' => '02',
                            'category' => 'Conference Rooms',
                            'title' => 'Boardroom Excellence',
                            'description' => 'Professional meeting spaces designed for executive success',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service/service-03.jpg',
                            'number' => '03',
                            'category' => 'Private Offices',
                            'title' => 'Luxury Office Suites',
                            'description' => 'Exclusive workspace environments crafted for business elite',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service/service-04.jpg',
                            'number' => '04',
                            'category' => 'Premium Furnishing',
                            'title' => 'Executive Furnishings',
                            'description' => 'Curated luxury furniture collections for discerning leaders',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service/service-05.jpg',
                            'number' => '05',
                            'category' => 'Strategic Planning',
                            'title' => 'Workspace Strategy',
                            'description' => 'Strategic workspace planning for maximum business performance',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service/service-06.jpg',
                            'number' => '06',
                            'category' => 'Space Planning',
                            'title' => '3D Design Visualization',
                            'description' => 'Advanced workspace visualization for informed decision making',
                            'link' => 'service-details.html',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_grid_variation_3',
                'data' => [
                    'title' => 'Premium Services For Leaders',
                    'clock_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/clock.png',
                    'frame_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/frame-img-01.png',
                    'services' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/service/service-01.jpg',
                            'number' => '01',
                            'category' => 'Offices',
                            'title' => 'Private Executive Offices',
                            'description' => 'Our luxury offices deliver prestige and privacy tailored to business leaders and executives.',
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-premium',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/service/service-02.jpg',
                            'number' => '02',
                            'category' => 'Meeting Rooms',
                            'title' => 'Boardroom Excellence',
                            'description' => 'State-of-the-art conference facilities equipped with premium technology for power meetings.',
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-premium',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/service/service-03.jpg',
                            'number' => '03',
                            'category' => 'Support',
                            'title' => 'Concierge Services',
                            'description' => 'Dedicated support staff handling logistics, hospitality, and business needs with discretion.',
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-premium',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/service/service-04.jpg',
                            'number' => '04',
                            'category' => 'Amenities',
                            'title' => 'Business Lounge Access',
                            'description' => 'Sophisticated lounges designed for networking, informal meetings, and executive relaxation.',
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-premium',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/service/service-05.jpg',
                            'number' => '05',
                            'category' => 'Technology',
                            'title' => 'Premium IT Infrastructure',
                            'description' => 'High-speed connectivity, cybersecurity, and cutting-edge technology for seamless operations.',
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-premium',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/service/service-06.jpg',
                            'number' => '06',
                            'category' => 'Events',
                            'title' => 'Executive Event Spaces',
                            'description' => 'Prestigious venues perfect for corporate gatherings, presentations, and high-level functions.',
                            'icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-premium',
                            'link' => 'service-details.html',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_grid_variation_4',
                'data' => [
                    'left_main_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/service-left-img.jpg',
                    'icon_box_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/ihbox/icon-box-img-1.png',
                    'icon_box_text' => 'Join our 2500+ executive members',
                    'phone_icon' => 'pbmit-base-icon-phone-volume-solid-1',
                    'phone_number' => '+125-8845-5421',
                    'subtitle' => 'Premium Offerings',
                    'title' => 'Executive Benefits',
                    'services' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/service/service-01.jpg',
                            'category' => 'Executive',
                            'title' => 'Private Office Suites',
                            'description' => 'Premium dedicated offices designed for business leadership',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/service/service-02.jpg',
                            'category' => 'Boardroom',
                            'title' => 'Conference Facilities',
                            'description' => 'State-of-the-art meeting rooms with advanced technology',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/service/service-03.jpg',
                            'category' => 'Concierge',
                            'title' => 'Business Concierge',
                            'description' => 'Dedicated support services for all your professional needs',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/service/service-04.jpg',
                            'category' => 'Networking',
                            'title' => 'Executive Networking',
                            'description' => 'Connect with industry leaders through exclusive events',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/service/service-05.jpg',
                            'category' => 'Amenities',
                            'title' => 'Premium Amenities',
                            'description' => 'Five-star facilities including lounge and dining areas',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/service/service-06.jpg',
                            'category' => 'Technology',
                            'title' => 'Tech Infrastructure',
                            'description' => 'High-speed connectivity and secure IT infrastructure',
                            'link' => 'service-details.html',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_slider',
                'data' => [
                    'subtitle' => 'Premium Services',
                    'title' => 'Tailored for Executive Excellence',
                    'services' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/service/service-01.jpg',
                            'category' => 'Executive Suite',
                            'title' => 'Private Office Suites',
                            'description' => 'Prestigious workspace solutions designed for discerning leaders',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/service/service-02.jpg',
                            'category' => 'Concierge Services',
                            'title' => 'Elite Business Support',
                            'description' => 'Professional concierge services tailored to executive demands',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/service/service-03.jpg',
                            'category' => 'Meeting Facilities',
                            'title' => 'Boardroom & Conference',
                            'description' => 'Premium meeting spaces equipped with cutting-edge technology',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/service/service-04.jpg',
                            'category' => 'Premium Amenities',
                            'title' => 'Luxury Business Lounge',
                            'description' => 'Exclusive networking spaces with refined hospitality services',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/service/service-05.jpg',
                            'category' => 'Membership Plans',
                            'title' => 'Flexible Membership',
                            'description' => 'Customizable packages designed for dynamic business leaders',
                            'link' => 'service-details.html',
                        ],
                    ],
                ],
            ],
        ];

        // ============================================
        // BATCH 4: Pricing (4 blocks)
        // ============================================
        $batch4 = [
            [
                'type' => 'pricing_table',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/pattern-bg-03.png',
                    'subtitle' => 'Membership Plans',
                    'title' => 'Premium workspace for visionary leaders!',
                    'description' => 'We meticulously curate every executive workspace, so you can rest assured that your business would experience the absolute highest caliber of professional environment.',
                    'plans' => [
                        ['name' => 'Executive Start', 'price' => '899', 'currency' => 'EGP', 'period' => '/mo', 'featured' => false, 'features' => [['text' => 'Entrepreneurs & solo executives', 'has_icon' => true], ['text' => 'Access to premium office suites', 'has_icon' => false], ['text' => 'Curated collection of luxury amenities', 'has_icon' => false], ['text' => 'Concierge support', 'has_icon' => true], ['text' => 'Business networking', 'has_icon' => true]], 'button_text' => 'Reserve Your Space', 'button_link' => '#'],
                        ['name' => 'Leadership Elite', 'price' => '1,499', 'currency' => 'EGP', 'period' => '/mo', 'featured' => true, 'features' => [['text' => 'Growing teams & senior leaders', 'has_icon' => true], ['text' => 'Priority access to boardrooms', 'has_icon' => true], ['text' => 'Exclusive portfolio of premium services', 'has_icon' => true], ['text' => 'Dedicated account manager', 'has_icon' => true], ['text' => 'VIP event invitations', 'has_icon' => true]], 'button_text' => 'Reserve Your Space', 'button_link' => '#'],
                        ['name' => 'Chairman Suite', 'price' => '2,999', 'currency' => 'EGP', 'period' => '/ mo', 'featured' => false, 'features' => [['text' => 'C-Suite executives & enterprise teams', 'has_icon' => true], ['text' => 'Unlimited access to all facilities', 'has_icon' => false], ['text' => 'Complete suite of executive amenities', 'has_icon' => false], ['text' => 'White-glove concierge', 'has_icon' => true], ['text' => 'Strategic partnerships', 'has_icon' => true]], 'button_text' => 'Reserve Your Space', 'button_link' => '#'],
                    ],
                ],
            ],
            [
                'type' => 'pricing_variation_2',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/bg/pattern-bg-02.png',
                    'currency' => 'EGP',
                    'subtitle' => 'Membership Plans',
                    'title' => 'Choose plan for your business',
                    'benefits' => [
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-check-mark', 'text' => 'Get 30 day trial period'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-wallet', 'text' => 'Transparent pricing structure'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-clock', 'text' => 'Flexible membership terms'],
                    ],
                    'button_text' => 'View All Plans',
                    'button_link' => 'our-history.html',
                    'plans' => [
                        [
                            'name' => 'Professional',
                            'price' => '27',
                            'period' => '/Mo',
                            'featured' => false,
                            'features' => [
                                ['text' => 'Individual executives & freelancers'],
                                ['text' => 'Access to premium workspace amenities'],
                                ['text' => 'Business lounge & meeting facilities'],
                                ['text' => 'Concierge support'],
                                ['text' => 'Monthly networking events'],
                            ],
                            'button_text' => 'Join Now',
                            'button_link' => 'about-mask-img',
                        ],
                        [
                            'name' => 'Executive',
                            'price' => '47',
                            'period' => '/mo',
                            'featured' => true,
                            'features' => [
                                ['text' => 'Business leaders & executive teams'],
                                ['text' => 'Full access to luxury office suites'],
                                ['text' => 'Private boardrooms & executive lounges'],
                                ['text' => 'Dedicated concierge'],
                                ['text' => 'Exclusive networking events'],
                            ],
                            'button_text' => 'Join Now',
                            'button_link' => 'about-mask-img',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'pricing_variation_3',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-1/bg/pricing-bg-shape.png',
                    'subtitle' => 'Membership Plans',
                    'title' => 'Choose your executive workspace',
                    'button_text' => 'View All Plans',
                    'button_link' => 'our-history.html',
                    'button_class' => 'pbmit-btn-outline',
                    'features' => [
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-check-mark', 'text' => 'Get 30 day trial period'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-wallet', 'text' => 'Transparent pricing policy'],
                        ['icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-clock', 'text' => 'Flexible membership terms'],
                    ],
                    'plans' => [
                        [
                            'name' => 'Professional',
                            'price' => '27',
                            'currency' => 'EGP',
                            'period' => '/Mo',
                            'featured' => false,
                            'features' => [
                                ['text' => 'Solo entrepreneurs & consultants'],
                                ['text' => 'Premium workspace essentials'],
                                ['text' => 'Standard meeting room access'],
                                ['text' => 'Business support'],
                                ['text' => 'Weekly amenities'],
                            ],
                            'button_text' => 'Select Plan',
                            'button_link' => 'about-mask-img',
                        ],
                        [
                            'name' => 'Executive Suite',
                            'price' => '47',
                            'currency' => 'EGP',
                            'period' => '/mo',
                            'featured' => true,
                            'features' => [
                                ['text' => 'Business leaders & growing teams'],
                                ['text' => 'Luxury workspace with concierge'],
                                ['text' => 'Priority meeting & event spaces'],
                                ['text' => 'Dedicated support'],
                                ['text' => 'Daily refreshments'],
                            ],
                            'button_text' => 'Select Plan',
                            'button_link' => 'about-mask-img',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'pricing_variation_4',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/bg/col-bg-img-01.png',
                    'left_title' => 'Executive <br> Member Support.',
                    'left_description' => 'Dedicated assistance for business leaders seeking premium workspace solutions and professional services.',
                    'left_icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-offer',
                    'left_button_text' => 'View All Services',
                    'left_button_link' => '/services',
                    'center_title' => 'Premium Executive <br>Membership Package',
                    'center_description' => 'Exclusive access to luxury workspaces, concierge services, and premium business amenities worldwide.',
                    'center_features' => [
                        ['icon' => 'ti-check', 'text' => 'Dedicated executive concierge team'],
                        ['icon' => 'ti-check', 'text' => '24/7 premium workspace accessibility'],
                        ['icon' => 'ti-check', 'text' => 'Flexible membership across global locations'],
                    ],
                    'center_button_text' => 'Explore Membership Tiers',
                    'center_button_link' => '/contact-us',
                    'right_title' => 'Discover Our <br>Luxury Workspaces',
                    'right_description' => 'Explore our portfolio of prestigious locations designed for discerning business professionals.',
                    'right_icon' => 'pbmit-xinterio-icon pbmit-xinterio-icon-award',
                    'right_button_text' => 'View All Locations',
                    'right_button_link' => '/portfolio',
                ],
            ],
        ];

        // ============================================
        // BATCH 5: Testimonials, Portfolio, Process (10 blocks)
        // ============================================
        $batch5 = [
            [
                'type' => 'testimonials',
                'data' => [
                    'title' => 'Hear from our distinguished members.',
                    'description' => 'Industry leaders and successful entrepreneurs share their executive workspace experiences.',
                    'rating' => '4.82',
                    'total_reviews' => '2,488 Rating',
                    'testimonials' => [
                        [
                            'author_name' => 'Alexander Montgomery',
                            'author_position' => 'CEO, Investment Firm',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-01.jpg',
                            'rating' => 5,
                            'content' => 'This workspace has fundamentally transformed how I conduct business. The environment exudes prestige and inspires excellence in every client meeting. My productivity has increased substantially since relocating here.',
                        ],
                        [
                            'author_name' => 'Victoria Blackwood',
                            'author_position' => 'Managing Director, Private Equity',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-02.jpg',
                            'rating' => 5,
                            'content' => 'The sophisticated Italian design combined with cutting-edge technology creates an environment where billion-dollar decisions feel natural. The networking opportunities alone have been worth ten times the membership fee.',
                        ],
                        [
                            'author_name' => 'Marcus Chen',
                            'author_position' => 'Chairman, Global Ventures',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-03.jpg',
                            'rating' => 5,
                            'content' => 'Every detail reflects excellence I demand in my operations. From the hand-selected marble finishes to the impeccable five-star service, this is where success meets sophisticated business environments. Truly world-class.',
                        ],
                        [
                            'author_name' => 'Robert Gold',
                            'author_position' => 'Grorgia, USA',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-04.jpg',
                            'rating' => 5,
                            'content' => 'Their team are easy to work with and helped me make amazing websites in a short amount of time. Thanks guys for all your hard work. Trust us we looked for a very long time.',
                        ],
                    ],
                    'client_logos' => [
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-01.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-01.png'],
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-02.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-02.png'],
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-03.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-03.png'],
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-04.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-04.png'],
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-05.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-05.png'],
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-06.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-06.png'],
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-07.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-07.png'],
                        ['name' => 'Client 07', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-global-08.png', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/client/client-white-08.png'],
                    ],
                ],
            ],
            [
                'type' => 'testimonials_variation_2',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/bg/testimonial-bg-01.jpg',
                    'video_link' => 'https://www.youtube.com/watch?v=Sv2_JktdvmQ',
                    'video_title' => 'Experience excellence',
                    'pattern_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/bg/pattern-bg-02.png',
                    'rating' => '4.82',
                    'total_reviews' => '3,247 Reviews',
                    'subtitle' => 'Executive testimonials',
                    'title' => 'Trusted by business leaders worldwide',
                    'testimonials' => [
                        [
                            'content' => 'The executive workspace exceeded all expectations. Premium amenities and impeccable service created the perfect environment for our business operations. A truly professional experience worth every investment.',
                            'author_name' => 'Victoria Sterling',
                            'author_position' => 'Chief Executive Officer',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/testimonial/reviewer-01.jpg',
                            'rating' => 5,
                        ],
                        [
                            'content' => 'Outstanding luxury workspace that transformed how we conduct business. The sophisticated atmosphere and premium facilities provided our leadership team with an environment that inspires excellence and productivity.',
                            'author_name' => 'Marcus Wellington',
                            'author_position' => 'Managing Director',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/testimonial/reviewer-02.jpg',
                            'rating' => 5,
                        ],
                        [
                            'content' => 'Exceptional attention to detail and world-class service. This executive workspace delivers everything a modern business leader needs. From private offices to prestigious meeting rooms, it\'s the benchmark for luxury.',
                            'author_name' => 'Alexander Thornton',
                            'author_position' => 'Senior Partner',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/testimonial/reviewer-03.jpg',
                            'rating' => 5,
                        ],
                        [
                            'content' => 'Unparalleled professional workspace experience. The premium services and elegant design perfectly complement our corporate image. Every client meeting here reinforces our commitment to excellence and success.',
                            'author_name' => 'Richard Blackwood',
                            'author_position' => 'Chief Financial Officer',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/testimonial/reviewer-04.jpg',
                            'rating' => 5,
                        ],
                    ],
                ],
            ],
            [
                'type' => 'portfolio_grid',
                'data' => [
                    'title' => 'Explore our executive projects',
                    'stat_number' => '460',
                    'stat_suffix' => '+',
                    'stat_text' => 'Executive Workspace Solutions <br> delivered for elite clients',
                    'categories' => [
                        ['filter' => 'architecture', 'name' => 'Executive Suites'],
                        ['filter' => 'bedroom', 'name' => 'Private Offices'],
                        ['filter' => 'furniture', 'name' => 'Boardrooms'],
                        ['filter' => 'interior', 'name' => 'Reception Areas'],
                    ],
                    'items' => [
                        ['filter' => 'bedroom', 'category' => 'Private Offices', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-01.jpg', 'title' => 'Executive Retreat', 'alt' => 'portfolio-01'],
                        ['filter' => 'furniture', 'category' => 'Boardrooms', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-02.jpg', 'title' => 'Premium Elegance', 'alt' => 'portfolio-02'],
                        ['filter' => 'interior', 'category' => 'Reception Areas', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-03.jpg', 'title' => 'Grand Entrance', 'alt' => 'portfolio-03'],
                        ['filter' => 'kitchen', 'category' => 'Business Lounges', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-04.jpg', 'title' => 'Elite Ambiance', 'alt' => 'portfolio-04'],
                        ['filter' => 'bedroom', 'category' => 'Private Offices', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-05.jpg', 'title' => 'Power Presence', 'alt' => 'portfolio-05'],
                        ['filter' => 'architecture', 'category' => 'Executive Suites', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-06.jpg', 'title' => 'Strategic Hub', 'alt' => 'portfolio-06'],
                        ['filter' => 'interior', 'category' => 'Reception Areas', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-07.jpg', 'title' => 'Leadership Space', 'alt' => 'portfolio-07'],
                        ['filter' => 'furniture', 'category' => 'Boardrooms', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/portfolio/portfolio-08.jpg', 'title' => 'Decision Center', 'alt' => 'portfolio-08'],
                    ],
                ],
            ],
            [
                'type' => 'portfolio_variation_2',
                'data' => [
                    'items' => [
                        ['category' => 'Executive Office', 'title' => 'Innovation', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-01.jpg'],
                        ['category' => 'Premium Furnishing', 'title' => 'Minimalism', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-02.jpg'],
                        ['category' => 'Workspace Design', 'title' => 'Lighting', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-03.jpg'],
                        ['category' => 'Conference Room', 'title' => 'Bold Finishes', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-04.jpg'],
                        ['category' => 'Private Suite', 'title' => 'Clean Lines', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-05.jpg'],
                        ['category' => 'Corporate Space', 'title' => 'Seamless', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-06.jpg'],
                        ['category' => 'Meeting Room', 'title' => 'Productivity', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-07.jpg'],
                        ['category' => 'Executive Lounge', 'title' => 'Sophistication', 'link' => 'portfolio-grid-col-3.html', 'detail_link' => 'portfolio-detail-style-1.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/portfolio/portfolio-08.jpg'],
                    ],
                ],
            ],
            [
                'type' => 'portfolio_variation_3',
                'data' => [
                    'title' => 'Explore Our Executive Workspace Portfolio',
                    'show_sortable' => true,
                    'columns' => '4',
                    'categories' => [
                        ['filter' => 'architecture', 'name' => 'Private Office'],
                        ['filter' => 'bedroom', 'name' => 'Meeting Rooms'],
                        ['filter' => 'furniture', 'name' => 'Luxury Suites'],
                        ['filter' => 'interior', 'name' => 'Coworking'],
                        ['filter' => 'kitchen', 'name' => 'Amenities'],
                    ],
                    'items' => [
                        ['category' => 'bedroom', 'category_name' => 'Meeting Rooms', 'title' => 'Executive Hub', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-01.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'furniture', 'category_name' => 'Luxury Suites', 'title' => 'Premium Office', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-02.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'interior', 'category_name' => 'Coworking', 'title' => 'Innovation Space', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-03.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'kitchen', 'category_name' => 'Amenities', 'title' => 'Business Lounge', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-04.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'bedroom', 'category_name' => 'Meeting Rooms', 'title' => 'Professional Edge', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-05.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'architecture', 'category_name' => 'Private Office', 'title' => 'Elite Suite', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-06.jpg', 'link' => 'portfolio-detail-style-1.html'],
                    ],
                ],
            ],
            [
                'type' => 'portfolio_variation_4',
                'data' => [
                    'subtitle' => 'Our Portfolio',
                    'title' => 'Featured Executive Spaces',
                    'items' => [
                        ['category' => 'Executive Suite', 'title' => 'Corner Office', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-01.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'Meeting Room', 'title' => 'Board Meeting', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-02.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'Private Office', 'title' => 'CEO Suite', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-03.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'Conference', 'title' => 'Strategy Room', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-04.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'Business Lounge', 'title' => 'VIP Lounge', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-05.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'Workspace', 'title' => 'Hot Desk Area', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-06.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'Reception', 'title' => 'Welcome Center', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-07.jpg', 'link' => 'portfolio-detail-style-1.html'],
                        ['category' => 'Breakout', 'title' => 'Relaxation Zone', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/portfolio/portfolio-08.jpg', 'link' => 'portfolio-detail-style-1.html'],
                    ],
                ],
            ],
            
            [
                'type' => 'process',
                'data' => [
                    'subtitle' => 'Premium Process',
                    'title' => 'Experience luxury workspace in <br> 4 seamless steps',
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/bg/step-bg.png',
                    'steps' => [
                        ['number' => '01', 'title' => 'Executive consultation', 'description' => 'We understand your vision and business needs for the perfect workspace.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/static-box/sbox-img-01.jpg'],
                        ['number' => '02', 'title' => 'Bespoke design presentation', 'description' => 'Premium concepts tailored to elevate your professional environment.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/static-box/sbox-img-02.jpg'],
                        ['number' => '03', 'title' => 'Masterful implementation', 'description' => 'Expert craftsmanship brings your luxury workspace vision to reality.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/static-box/sbox-img-03.jpg'],
                        ['number' => '04', 'title' => 'Elevate your business', 'description' => 'Step into your refined executive space and inspire excellence daily.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/static-box/sbox-img-04.jpg'],
                    ],
                ],
            ],
            [
                'type' => 'process_variation_2',
                'data' => [
                    'subtitle' => 'Excellence Redefined',
                    'title' => 'Your Executive Journey',
                    'steps' => [
                        ['number' => '01', 'title' => 'Consultation & Assessment', 'description' => 'Begin your executive experience with a personalized consultation where we assess your business needs, workspace preferences, and professional requirements to craft your ideal luxury environment', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/static-box/sbox-img-01.jpg', 'button_text' => 'Learn More', 'link' => '#'],
                        ['number' => '02', 'title' => 'Custom Workspace Design', 'description' => 'Our design specialists curate a bespoke workspace solution tailored to your executive profile, featuring premium furnishings, advanced technology, and sophisticated aesthetics', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/static-box/sbox-img-02.jpg', 'button_text' => 'Learn More', 'link' => '#'],
                        ['number' => '03', 'title' => 'Seamless Setup Process', 'description' => 'Our dedicated team handles every detail of your workspace preparation, from infrastructure installation to technology integration, ensuring a flawless transition for your business', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/static-box/sbox-img-03.jpg', 'button_text' => 'Learn More', 'link' => '#'],
                        ['number' => '04', 'title' => 'Premium Concierge Support', 'description' => 'Experience unparalleled service with our executive concierge team, providing continuous support, workspace management, and premium amenities to elevate your professional success', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/static-box/sbox-img-04.jpg', 'button_text' => 'Learn More', 'link' => '#'],
                    ],
                ],
            ],
            [
                'type' => 'history_timeline',
                'data' => [
                    'events' => [
                        [
                            'year' => '2015',
                            'title' => 'Our Foundation',
                            'description' => 'Launch of premier executive workspace concept in flagship location.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/history/time-line-01.jpg',
                        ],
                        [
                            'year' => '2017',
                            'title' => 'Global Expansion',
                            'description' => 'Established presence in 10 international business capitals worldwide.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/history/time-line-02.jpg',
                        ],
                        [
                            'year' => '2019',
                            'title' => 'Premium Services',
                            'description' => 'Launched comprehensive concierge and wellness program suite.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/history/time-line-03.jpg',
                        ],
                        [
                            'year' => '2021',
                            'title' => 'Technology Integration',
                            'description' => 'Deployed enterprise-grade security and smart office automation systems.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/history/time-line-04.jpg',
                        ],
                        [
                            'year' => '2022',
                            'title' => 'Member Network',
                            'description' => 'Achieved 5000+ distinguished members across our global portfolio.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/history/time-line-05.jpg',
                        ],
                        [
                            'year' => '2023',
                            'title' => 'Industry Leadership',
                            'description' => 'Recognized as premier executive workspace provider with multiple awards.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/history/time-line-06.jpg',
                        ],
                    ],
                ],
            ],
        ];

        // ============================================
        // BATCH 6: Features, Icons, Accordion, Tabs, Team, Awards, CTA (12 blocks)
        // ============================================
        $batch6 = [
            [
                'type' => 'features_grid',
                'data' => [
                    'title' => 'Why Choose Executive Workspace?',
                    'tabs' => [
                        ['tab_title' => 'Premium Facilities', 'content_title' => 'Elevating the standard of business excellence.', 'description' => 'Our executive workspace offers world-class amenities designed for distinguished professionals who demand nothing but the finest. Experience unparalleled comfort and sophistication in every detail of your workspace.', 'highlight_number' => '25+', 'highlight_text' => 'Years serving executives', 'features' => ['State-of-the-art conference facilities', 'Dedicated concierge service', 'Premium refreshments and executive lounge access', 'Customizable workspace configurations'], 'button_text' => 'Our Services', 'button_link' => 'service-details.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/tab-img/tab-img-01.jpg'],
                        ['tab_title' => 'Professional Environment', 'content_title' => 'Inspiring productivity through design.', 'description' => 'Immerse yourself in an atmosphere crafted for success. Our thoughtfully designed spaces blend modern aesthetics with functional luxury, creating the perfect setting for executive achievement and business growth.', 'highlight_number' => '35+', 'highlight_text' => 'Premium office suites', 'features' => ['Dedicated member success managers', 'Professional interior design expertise', 'Seamless workspace setup and transition support', 'Adaptable layouts for growing enterprises'], 'button_text' => 'Our Services', 'button_link' => 'service-details.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/tab-img/tab-img-02.jpg'],
                        ['tab_title' => 'Flexible Memberships', 'content_title' => 'Tailored solutions for every business.', 'description' => 'Choose from our transparent membership options designed to align with your business needs. From private offices to executive suites, we offer flexible plans that scale with your success, all with premium benefits included.', 'highlight_number' => '15+', 'highlight_text' => 'Membership packages', 'features' => ['Professional workspace management team', 'Exceptional client relations excellence', 'Flexible contract terms with no hidden fees', 'Effortless transition and onboarding process'], 'button_text' => 'Our Services', 'button_link' => 'service-details.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/tab-img/tab-img-03.jpg'],
                        ['tab_title' => 'Strategic Locations', 'content_title' => 'Prime addresses in prestigious districts.', 'description' => 'Establish your business presence in the most coveted commercial centers. Our strategically positioned executive workspaces place you at the heart of business districts, ensuring maximum accessibility and corporate prestige.', 'highlight_number' => '20+', 'highlight_text' => 'Strategic locations', 'features' => ['White-glove executive service', 'Premium location specialists', 'Streamlined relocation and logistics support', 'Multiple locations accessible with one membership'], 'button_text' => 'Our Services', 'button_link' => 'service-details.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/tab-img/tab-img-04.jpg'],
                        ['tab_title' => 'Business Support', 'content_title' => 'Comprehensive services for business leaders.', 'description' => 'Focus on what matters most - growing your business. Our comprehensive support services handle everything from IT infrastructure to administrative assistance, allowing you to operate at peak efficiency every single day.', 'highlight_number' => '10+', 'highlight_text' => 'Business support services', 'features' => ['Enterprise-level IT infrastructure', 'Professional administrative assistance', '24/7 technical support and facility management', 'Scalable services that expand with your needs'], 'button_text' => 'Our Services', 'button_link' => 'service-details.html', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/tab-img/tab-img-05.jpg'],
                    ],
                ],
            ],
            [
                'type' => 'features_slider',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/bg/pattern-bg-01.png',
                    'subtitle' => 'Why Executive Professionals Choose Us',
                    'title' => 'Excellence without compromise, success <br> guaranteed.',
                    'features' => [
                        [
                            'number' => '01',
                            'icon' => 'pbmit-xinterio-icon-living-room',
                            'title' => '5 Years Premium Guarantee',
                            'description' => 'Our commitment to excellence ensures lasting quality in every detail of your workspace.',
                        ],
                        [
                            'number' => '02',
                            'icon' => 'pbmit-xinterio-icon-house',
                            'title' => 'State-of-the-Art Solutions',
                            'description' => 'Cutting-edge technology integrated seamlessly to enhance productivity and efficiency.',
                        ],
                        [
                            'number' => '03',
                            'icon' => 'pbmit-xinterio-icon-brickwall-1',
                            'title' => 'Luxury Workspace Design',
                            'description' => 'Sophisticated environments crafted exclusively for discerning business professionals.',
                        ],
                        [
                            'number' => '04',
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Premium Value Pricing',
                            'description' => 'Clear investment structures designed for executive decision-makers and stakeholders.',
                        ],
                        [
                            'number' => '05',
                            'icon' => 'pbmit-xinterio-icon-3d',
                            'title' => 'Executive Space Planning',
                            'description' => 'Strategic layouts optimized for leadership performance and professional excellence.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'icon_box',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/bg/bg-img-01.jpg',
                    'subtitle' => 'Since 2015',
                    'title' => 'The distinction of <br> our executive platform.',
                    'description_1' => 'Executive workspace leadership represents the transformation of professional environments into strategic business assets. We architect premium spaces where Italian design excellence merges with enterprise technology, creating distinguished environments that amplify executive productivity and organizational distinction.',
                    'description_2' => 'Our portfolio encompasses two refined categories: Private Executive Suites tailored for C-level executives demanding absolute privacy and prestige, and Collaborative Executive Centers providing comprehensive business infrastructure with concierge services and global networking ecosystems for high-growth organizations.',
                    'signature_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/sign.webp',
                ],
            ],
            [
                'type' => 'icon_box_variation_2',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/about-company-bg.png',
                    'left_background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/about-company-img.jpg',
                    'video_url' => 'https://www.youtube.com/watch?v=Sv2_JktdvmQ',
                    'video_icon' => 'pbmit-base-icon-play-button-1',
                    'video_title' => 'Watch our showcase',
                    'subtitle' => 'Since 2015',
                    'title' => 'The distinction of our executive environment.',
                    'description_1' => 'Executive workspace excellence represents the evolution of professional environments where premium design meets strategic functionality. Our approach combines Italian craftsmanship, cutting-edge technology, and personalized services to create spaces that inspire innovation and foster success.',
                    'description_2' => 'We deliver two categories of executive solutions: Premium Private Offices designed for established leaders requiring dedicated spaces, and Flexible Executive Suites offering complete workspace ecosystems with comprehensive business support services and global networking opportunities.',
                    'signature_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/sign.png',
                ],
            ],
            [
                'type' => 'accordion',
                'data' => [
                    'subtitle' => 'Executive Excellence',
                    'title' => 'Creating the art of professional distinction.',
                    'chair_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/chair.png',
                    'sofa_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/sofa.png',
                    'floor_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/floor.png',
                    'items' => [
                        [
                            'title' => 'What defines our luxury workspace experience?',
                            'content' => '<P>Our workspaces feature premium Italian leather furnishings, hand-crafted executive desks, and cutting-edge technology seamlessly integrated into timeless architectural design for distinguished professionals.</P>',
                        ],
                        [
                            'title' => 'What exclusive amenities distinguish our offering?',
                            'content' => '<p>Distinguished members enjoy 24/7 personal concierge service, executive chef-prepared gourmet dining, private wellness facilities, chauffeur services, and fiber optic connectivity with premium espresso bars in every suite.</p>',
                        ],
                        [
                            'title' => 'How do we ensure privacy and security?',
                            'content' => '<p>We implement biometric access control, 24/7 AI-powered surveillance, encrypted communication systems, soundproofed offices with white noise generators, and dedicated IT security specialists monitoring all systems for absolute confidentiality.</p>',
                        ],
                        [
                            'title' => 'Can I create custom design?',
                            'content' => '<p>The basic philosophy of our studio is to create individual, aesthetically stunning solutions for our customers by lightning-fast development.</p>',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'tabs',
                'data' => [
                    'subtitle' => 'Since 2015',
                    'title' => 'What We Offer Your Enterprise',
                    'tabs' => [
                        [
                            'title' => 'Technology Infrastructure',
                            'content_title' => 'Uncompromising connectivity and enterprise security.',
                            'description' => '10Gbps fiber optic internet with 99.99% uptime guarantee, enterprise cybersecurity with dedicated SOC team, and 4K video conferencing suites with simultaneous translation capabilities.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/tab-img1.jpg',
                            'features' => [
                                '10Gbps fiber optic with redundant connections',
                                'Enterprise cybersecurity and SOC monitoring',
                                '4K video conferencing with global translation',
                                'Smart office automation via mobile app',
                            ],
                        ],
                        [
                            'title' => 'Business Support Services',
                            'content_title' => 'Comprehensive business administration solutions.',
                            'description' => 'Professional administrative services including legal coordination, accounting support, HR consultation, and multilingual executive assistants available 24/7 for seamless operations.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/tab-img2.jpg',
                            'features' => [
                                'Multilingual executive assistants available',
                                'Corporate legal and accounting coordination',
                                'Professional HR consultation and recruitment',
                                'Document management and notary services',
                            ],
                        ],
                        [
                            'title' => 'Lifestyle Concierge',
                            'content_title' => 'Personalized executive lifestyle management.',
                            'description' => 'Dedicated concierge services handling travel arrangements, fine dining reservations, entertainment tickets, luxury transportation, and exclusive event access for discerning executives.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/tab-img3.jpg',
                            'features' => [
                                'Private jet and yacht charter coordination',
                                'Michelin-starred restaurant reservations',
                                'Exclusive event and VIP experience access',
                                'Personal shopping and lifestyle assistance',
                            ],
                        ],
                        [
                            'title' => 'Security & Privacy',
                            'content_title' => 'Military-grade protection for your business.',
                            'description' => 'Comprehensive security protocols including biometric access control, 24/7 AI surveillance, encrypted networks, soundproofed offices, and dedicated security personnel ensuring absolute confidentiality.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/tab-img4.jpg',
                            'features' => [
                                'Biometric access and facial recognition',
                                '24/7 AI-powered surveillance and monitoring',
                                'Soundproofed offices with white noise tech',
                                'Encrypted networks and secure data centers',
                            ],
                        ],
                        [
                            'title' => 'Wellness Programs',
                            'content_title' => 'Holistic wellness for peak performance.',
                            'description' => 'State-of-the-art fitness centers, yoga studios, meditation rooms, spa facilities, nutrition consultations, and wellness coaches dedicated to maintaining your optimal health and productivity.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/tab-img5.jpg',
                            'features' => [
                                'Premium fitness center and personal trainers',
                                'Spa facilities and massage therapy rooms',
                                'Meditation studios and mindfulness programs',
                                'Nutritionist consultations and wellness plans',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'type' => 'team',
                'data' => [
                    'subtitle' => 'Excellence Since 1986',
                    'title' => 'Our Executive Service Process',
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/bg/static-box-pattern-img.png',
                    'steps' => [
                        ['number' => '01', 'title' => 'Consultation & Assessment', 'description' => 'Our executive team begins with a comprehensive evaluation of your workspace needs and business objectives. Through detailed consultations, we assess your requirements for premium amenities, spatial configurations, and professional environment preferences to create a tailored workspace solution that elevates your executive presence.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/static-box/static-box-img-01.jpg'],
                        ['number' => '02', 'title' => 'Strategic Planning', 'description' => 'We develop a customized workspace strategy aligned with your executive vision and operational demands. Our experts curate premium furnishings, technology integration, and sophisticated design elements that reflect your leadership status and enhance productivity.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/static-box/static-box-img-02.jpg'],
                        ['number' => '03', 'title' => 'Premium Implementation', 'description' => 'Our dedicated professionals execute your executive workspace transformation with meticulous attention to detail and minimal disruption. We coordinate every aspect of the installation, from luxury furnishings to advanced business technology, ensuring each element meets the highest standards of quality and sophistication.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/static-box/static-box-img-03.jpg'],
                        ['number' => '04', 'title' => 'Seamless Transition', 'description' => 'Experience a flawless move into your new executive workspace with comprehensive support and white-glove service. Our concierge team ensures everything is perfectly positioned and operational, allowing you to focus on leading your business from day one.', 'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-9/static-box/static-box-img-04.jpg'],
                    ],
                ],
            ],
            [
                'type' => 'awards',
                'data' => [
                    'title' => 'Awards & Recognition',
                    'awards' => [
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award01.png', 'title' => 'Top 5 Executive Workspace Provider 2023'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award02.png', 'title' => 'Premier Luxury Business Environment Award'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award03.png', 'title' => 'Best Executive Membership Experience 2022'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award04.png', 'title' => 'Global Workspace Excellence Award 2023'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award05.png', 'title' => 'Distinguished Executive Services Leader 2023'],
                    ],
                ],
            ],
            [
                'type' => 'awards-award-achievement',
                'data' => [
                    'title' => 'Awards & Recognition',
                    'awards' => [
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award01.png', 'title' => 'Top 5 Executive Workspace Provider 2023'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award02.png', 'title' => 'Premier Luxury Business Environment Award'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award03.png', 'title' => 'Best Executive Membership Experience 2022'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award04.png', 'title' => 'Global Workspace Excellence Award 2023'],
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/ihbox/ih-award05.png', 'title' => 'Distinguished Executive Services Leader 2023'],
                    ],
                ],
            ],
            [
                'type' => 'clients_logos',
                'data' => [
                    'counter_number' => '120',
                    'counter_suffix' => '+',
                    'counter_text' => 'Join the enterprises that trust Executive to elevate their business operations.',
                    'clients' => [
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                        ['name' => 'Corporate Partner', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-global-', 'logo_grey' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-8/client/client-grey-'],
                    ],
                ],
            ],
            [
                'type' => 'before_after',
                'data' => [
                    'subtitle' => 'Since 2015',
                    'title' => 'We craft executive environments where leaders excel.',
                    'description' => 'Empowering business professionals with premium workspace solutions that enhance productivity and reflect their success. Our luxury environments are tailored for executives who demand excellence in every detail.',
                    'before_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/before.png',
                    'after_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/after.png',
                    'statistics' => [
                        ['percentage' => '87', 'color' => '#bb9a65', 'title' => 'Executive <br> Satisfaction'],
                        ['percentage' => '89', 'color' => '#bb9a65', 'title' => 'Premium <br> Workspaces'],
                    ],
                ],
            ],
            [
                'type' => 'cta',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/bg/about-us-bg.jpg',
                    'phone_icon' => 'pbmit-base-icon-phone-volume-solid-1',
                    'phone' => '+125-8845-5421',
                    'subtitle' => 'EXCLUSIVE MEMBERSHIP OFFER',
                    'title_prefix' => 'We create executive spaces so',
                    'title_suffix' => "you'll elevate your business",
                    'badge_text' => 'Premium Access',
                    'rotating_words' => [
                        ['word' => 'distinguished'],
                        ['word' => 'impressive'],
                        ['word' => 'sophisticated'],
                        ['word' => 'prestigious'],
                    ],
                ],
            ],
        ];

        // ============================================
        // BATCH 7: Blog & Events (2 blocks)
        // ============================================
        $batch7 = [
            [
                'type' => 'posts_grid',
                'data' => [
                    'subtitle' => 'Latest News',
                    'title' => 'From our blog',
                    'limit' => 3,
                    'columns' => 3,
                    'show_excerpt' => true,
                    'show_author' => true,
                    'show_date' => true,
                ],
            ],
            [
                'type' => 'events_grid',
                'data' => [
                    'subtitle' => 'Upcoming Events',
                    'title' => 'Join our executive networking events',
                    'description' => 'Connect with business leaders and industry experts.',
                    'limit' => 4,
                    'columns' => 2,
                    'show_date' => true,
                    'show_location' => true,
                    'show_excerpt' => true,
                ],
            ],
        ];

        // Combine all batches
        $allBlocks = array_merge($batch1, $batch2, $batch3, $batch4, $batch5, $batch6, $batch7);

        // Create 6 test pages (each with ~9 blocks)
        $chunkedBlocks = array_chunk($allBlocks, 9);

        foreach ($chunkedBlocks as $index => $blocks) {
            $pageNumber = $index + 1;

            // Static Page
            Page::updateOrCreate(
                ['slug' => "test-blocks-batch-{$pageNumber}-static"],
                [
                    'title' => "Test Blocks Batch {$pageNumber} - Static",
                    'content' => $blocks,
                    'status' => ContentStatus::PUBLISHED,
                    'settings' => [
                        'is_archive' => 0,
                        'header_style' => 3,
                        'footer_style' => 2,
                        'use_demo_sections' => true,
                    ],
                    'seo' => ['meta_title' => "Test Blocks Batch {$pageNumber} Static"],
                ]
            );

            // Dynamic Page
            Page::updateOrCreate(
                ['slug' => "test-blocks-batch-{$pageNumber}-dynamic"],
                [
                    'title' => "Test Blocks Batch {$pageNumber} - Dynamic",
                    'content' => $blocks,
                    'status' => ContentStatus::PUBLISHED,
                    'settings' => [
                        'is_archive' => 0,
                        'header_style' => 3,
                        'footer_style' => 2,
                        'use_demo_sections' => false,
                    ],
                    'seo' => ['meta_title' => "Test Blocks Batch {$pageNumber} Dynamic"],
                ]
            );
        }

        $totalBlocks = count($allBlocks);
        $totalPages = count($chunkedBlocks) * 2;
        echo "Created {$totalPages} test pages with {$totalBlocks} blocks total.\n";
        echo "Pages created:\n";
        for ($i = 1; $i <= count($chunkedBlocks); $i++) {
            echo "  - /test-blocks-batch-{$i}-static\n";
            echo "  - /test-blocks-batch-{$i}-dynamic\n";
        }
    }
}
