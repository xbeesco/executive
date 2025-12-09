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
                        ['text' => 'Premium workspace amenities included', 'icon' => 'pbmit-xinterio-icon-check-mark'],
                        ['text' => 'Dedicated concierge service 24/7', 'icon' => 'pbmit-xinterio-icon-check-mark'],
                        ['text' => 'Exclusive networking events monthly', 'icon' => 'pbmit-xinterio-icon-check-mark'],
                        ['text' => 'Private boardroom access', 'icon' => 'pbmit-xinterio-icon-check-mark'],
                    ],
                ],
            ],
            [
                'type' => 'content_quote',
                'data' => [
                    'quote' => 'Excellence is not a destination, it is a continuous journey that never ends. In our executive spaces, that journey is supported by world-class amenities.',
                    'author' => 'James Richardson',
                    'author_title' => 'CEO, Executive Workspace',
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
                    'description' => 'Since 2015, Executive Workspace has been dedicated to creating premium business environments that inspire leadership and drive success.',
                    'accordion_items' => [
                        [
                            'number' => '01',
                            'title' => 'Innovation',
                            'content' => 'From initial strategic planning to final implementation, we deliver cutting-edge workspace solutions that adapt to your evolving business needs.',
                        ],
                        [
                            'number' => '02',
                            'title' => 'Excellence',
                            'content' => 'We maintain the highest standards in every detail, from materials and craftsmanship to service and technology integration.',
                        ],
                        [
                            'number' => '03',
                            'title' => 'Partnership',
                            'content' => 'Your success is our priority. We build long-term relationships based on trust, transparency, and exceptional results.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'slider',
                'data' => [
                    'slides' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Private Office Suites',
                            'description' => 'Fully furnished executive offices with premium amenities and dedicated support services.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Boardroom Facilities',
                            'description' => 'State-of-the-art meeting rooms equipped with advanced presentation technology.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'title' => 'Business Networking',
                            'description' => 'Exclusive events connecting executive members and industry leaders.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-house-design',
                            'title' => 'Concierge Services',
                            'description' => 'Dedicated support staff to handle your business and personal requirements.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'about',
                'data' => [
                    'subtitle' => 'Executive Wellness',
                    'title' => 'Start your balanced executive lifestyle today',
                    'content' => '<p>We understand that peak performance requires holistic well-being. Our workspace integrates comprehensive wellness amenities with business functionality, creating environments where health and productivity coexist harmoniously.</p>',
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
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/about-bg.jpg',
                    'left_icon' => 'pbmit-xinterio-icon-award',
                    'left_title' => 'Award-Winning<br>Excellence',
                    'subtitle' => 'Since 2015',
                    'title' => 'We architect premium, executive-caliber environments.',
                    'description' => 'Our design philosophy combines sophisticated aesthetics with functional excellence, creating workspaces that inspire leadership and drive organizational success.',
                    'icon_boxes' => [
                        ['icon' => 'pbmit-xinterio-icon-tools', 'title' => 'Executive Suites'],
                        ['icon' => 'pbmit-xinterio-icon-hard-hat', 'title' => 'Conference Rooms'],
                        ['icon' => 'pbmit-xinterio-icon-offer', 'title' => 'Business Lounges'],
                        ['icon' => 'pbmit-xinterio-icon-house-design', 'title' => 'Smart Technology'],
                    ],
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
                        ['icon_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/ihbox/icon-box-img-1.png', 'title' => 'Join our 5000+ distinguished members'],
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
                    'subtitle' => 'Our Solutions',
                    'title' => 'Premium Executive Workspace Services',
                    'content' => '<p>We offer a comprehensive range of workspace solutions designed to meet the needs of modern business leaders and organizations.</p>',
                    'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-01.jpg',
                    'image_2' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg',
                    'features' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Private Office Suites',
                            'description' => 'Fully furnished executive offices with premium amenities.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Boardroom Facilities',
                            'description' => 'State-of-the-art meeting rooms with advanced technology.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'title' => 'Shared Workspaces',
                            'description' => 'Flexible workspace options for dynamic teams.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-house-design',
                            'title' => 'Executive Lounges',
                            'description' => 'Comfortable spaces for informal meetings and relaxation.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_variation_2',
                'data' => [
                    'left_image_1' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/home4-about-01.jpg',
                    'left_image_2' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/home4-about-02.jpg',
                    'subtitle' => 'Our Excellence',
                    'title' => 'Premium Executive Workspace Solutions',
                    'description' => 'Every detail of our executive workspaces is meticulously crafted to support productivity, inspire creativity, and elevate your professional image.',
                    'list_items' => [
                        ['text' => 'Dedicated concierge service exclusively for members'],
                        ['text' => 'Access to global network of premium workspaces'],
                        ['text' => 'Advanced security and privacy protection'],
                    ],
                    'icon_boxes' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Elite Professional Network',
                            'description' => '3,500,000+ executives including 850,000+ entrepreneurs worldwide.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-award',
                            'title' => 'Award-Winning Design',
                            'description' => 'Recognized globally for excellence in workspace innovation.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_variation_3',
                'data' => [
                    'subtitle' => 'Welcome to Executive Excellence',
                    'title' => 'We craft sophisticated, executive spaces.',
                    'description' => 'We carefully curate all workspace environments to reflect the highest standards of professional distinction and organizational success.',
                    'button_text' => 'Discover More',
                    'button_link' => '/contact-us',
                    'main_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service-center.jpg',
                    'services' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-price',
                            'title' => 'Transparent Pricing',
                            'description' => 'We offer competitive and premium rates with no hidden fees.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-quality',
                            'title' => 'Quality Assurance',
                            'description' => 'Every detail meets our rigorous standards for excellence.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-time',
                            'title' => 'Flexible Terms',
                            'description' => 'Membership options that adapt to your business needs.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-support',
                            'title' => 'Dedicated Support',
                            'description' => '24/7 concierge services for all member requirements.',
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
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-01.jpg',
                            'number' => '01',
                            'category' => 'Private Office',
                            'title' => 'Executive Suites',
                            'link' => '/services/executive-suites',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg',
                            'number' => '02',
                            'category' => 'Meeting Space',
                            'title' => 'Conference Rooms',
                            'link' => '/services/conference-rooms',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-03.jpg',
                            'number' => '03',
                            'category' => 'Flexible Space',
                            'title' => 'Hot Desking',
                            'link' => '/services/hot-desking',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_grid_variation_2',
                'data' => [
                    'main_background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/service-bg.jpg',
                    'services' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Private Offices',
                            'description' => 'Exclusive executive suites with premium furnishings.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Meeting Rooms',
                            'description' => 'Professional facilities for client presentations.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'title' => 'Smart Technology',
                            'description' => 'Integrated systems for seamless operations.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_grid_variation_3',
                'data' => [
                    'subtitle' => 'What We Offer',
                    'title' => 'Comprehensive Workspace Solutions',
                    'description' => 'Everything you need to operate at peak performance.',
                    'left_main_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service-left.jpg',
                    'icon_box_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/ihbox/icon-box-img-1.png',
                    'icon_box_text' => 'Join our 5000+ distinguished members',
                    'phone_icon' => 'pbmit-xinterio-icon-phone',
                    'phone_number' => '+1-800-EXEC',
                    'services' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service-01.jpg',
                            'category' => 'workspace-solutions',
                            'title' => 'Executive Suites',
                            'description' => 'Premium private offices for business leaders.',
                            'link' => '/services/executive-suites',
                            'button_icon' => 'pbmit-xinterio-icon-arrow-right',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-5/service-02.jpg',
                            'category' => 'meeting-facilities',
                            'title' => 'Conference Rooms',
                            'description' => 'State-of-the-art boardroom facilities.',
                            'link' => '/services/conference-rooms',
                            'button_icon' => 'pbmit-xinterio-icon-arrow-right',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_grid_variation_4',
                'data' => [
                    'left_main_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/service-main.jpg',
                    'icon_box_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-7/ihbox/icon-box-img-1.png',
                    'icon_box_text' => 'Join our 2500+ executive members',
                    'phone_icon' => 'pbmit-xinterio-icon-phone',
                    'phone_number' => '+1-800-EXEC',
                    'subtitle' => 'Premium Offerings',
                    'title' => 'Executive Benefits',
                    'services' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/service-01.jpg',
                            'category' => 'workspace-solutions',
                            'title' => 'Private Office Suites',
                            'description' => 'Premium dedicated offices designed for business leadership',
                            'link' => '/services/private-offices',
                            'button_icon' => 'pbmit-xinterio-icon-arrow-right',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-6/service-02.jpg',
                            'category' => 'meeting-facilities',
                            'title' => 'Boardroom Facilities',
                            'description' => 'Professional meeting spaces equipped with advanced technology',
                            'link' => '/services/boardrooms',
                            'button_icon' => 'pbmit-xinterio-icon-arrow-right',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'services_slider',
                'data' => [
                    'services' => [
                        [
                            'title' => 'Private Office Suites',
                            'description' => 'Fully furnished executive offices with premium amenities and dedicated support services.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-01.jpg',
                        ],
                        [
                            'title' => 'Meeting Facilities',
                            'description' => 'Professional boardrooms equipped with state-of-the-art presentation technology.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg',
                        ],
                        [
                            'title' => 'Business Lounges',
                            'description' => 'Comfortable spaces for informal meetings and executive networking.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-03.jpg',
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
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/pricing-bg.jpg',
                    'subtitle' => 'Membership Plans',
                    'title' => 'Premium workspace for visionary leaders!',
                    'description' => 'Choose the membership level that aligns with your business needs and professional aspirations.',
                    'plans' => [
                        [
                            'name' => 'Professional',
                            'price' => '1500',
                            'currency' => 'EGP',
                            'period' => '/mo',
                            'featured' => false,
                            'features' => [
                                ['text' => 'Individual executives & freelancers', 'has_icon' => true],
                                ['text' => 'Access to premium workspace amenities', 'has_icon' => true],
                                ['text' => 'Business lounge & meeting facilities', 'has_icon' => true],
                                ['text' => 'Concierge support', 'has_icon' => true],
                                ['text' => 'Monthly networking events', 'has_icon' => true],
                            ],
                            'button_text' => 'Reserve Your Space',
                            'button_link' => '/membership/professional',
                        ],
                        [
                            'name' => 'Executive',
                            'price' => '2500',
                            'currency' => 'EGP',
                            'period' => '/mo',
                            'featured' => true,
                            'features' => [
                                ['text' => 'Business leaders & executive teams', 'has_icon' => true],
                                ['text' => 'Full access to luxury office suites', 'has_icon' => true],
                                ['text' => 'Private boardrooms & executive lounges', 'has_icon' => true],
                                ['text' => 'Dedicated concierge', 'has_icon' => true],
                                ['text' => 'Exclusive networking events', 'has_icon' => true],
                            ],
                            'button_text' => 'Reserve Your Space',
                            'button_link' => '/membership/executive',
                        ],
                        [
                            'name' => 'Enterprise',
                            'price' => '5000',
                            'currency' => 'EGP',
                            'period' => '/mo',
                            'featured' => false,
                            'features' => [
                                ['text' => 'Organizations & corporate teams', 'has_icon' => true],
                                ['text' => 'Custom workspace solutions', 'has_icon' => true],
                                ['text' => 'Dedicated office suites & staff areas', 'has_icon' => true],
                                ['text' => '24/7 concierge & facility access', 'has_icon' => true],
                                ['text' => 'Premium networking & events', 'has_icon' => true],
                            ],
                            'button_text' => 'Reserve Your Space',
                            'button_link' => '/membership/enterprise',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'pricing_variation_2',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/pricing-bg.jpg',
                    'currency' => 'EGP',
                    'subtitle' => 'Membership Plans',
                    'title' => 'Choose plan for your business',
                    'benefits' => [
                        ['icon' => 'pbmit-xinterio-icon-check-mark', 'text' => 'Premium workspace amenities'],
                        ['icon' => 'pbmit-xinterio-icon-check-mark', 'text' => 'Dedicated concierge services'],
                        ['icon' => 'pbmit-xinterio-icon-check-mark', 'text' => 'Exclusive networking events'],
                    ],
                    'button_text' => 'View All Plans',
                    'button_link' => '/pricing',
                    'plans' => [
                        [
                            'name' => 'Professional',
                            'price' => '1500',
                            'period' => '/Mo',
                            'featured' => false,
                            'features' => [
                                ['text' => 'Individual executives & freelancers'],
                                ['text' => 'Access to premium workspace amenities'],
                                ['text' => 'Business lounge & meeting facilities'],
                            ],
                            'button_text' => 'Join Now',
                            'button_link' => '/membership/professional',
                        ],
                        [
                            'name' => 'Executive',
                            'price' => '2500',
                            'period' => '/Mo',
                            'featured' => true,
                            'features' => [
                                ['text' => 'Business leaders & executive teams'],
                                ['text' => 'Full access to luxury office suites'],
                                ['text' => 'Private boardrooms & executive lounges'],
                            ],
                            'button_text' => 'Join Now',
                            'button_link' => '/membership/executive',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'pricing_variation_3',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-4/pricing-bg.jpg',
                    'subtitle' => 'Membership Plans',
                    'title' => 'Choose your executive workspace',
                    'button_text' => 'View All Plans',
                    'button_link' => '/pricing',
                    'features' => [
                        ['icon' => 'pbmit-xinterio-icon-check-mark', 'text' => 'Flexible membership terms'],
                        ['icon' => 'pbmit-xinterio-icon-check-mark', 'text' => 'Premium workspace access'],
                        ['icon' => 'pbmit-xinterio-icon-check-mark', 'text' => '24/7 support services'],
                    ],
                    'plans' => [
                        [
                            'name' => 'Professional',
                            'price' => '1500',
                            'currency' => 'EGP',
                            'period' => '/month',
                            'featured' => false,
                            'features' => [
                                ['text' => 'Individual workspace access'],
                                ['text' => 'Meeting room booking'],
                                ['text' => 'Business lounge access'],
                            ],
                            'button_text' => 'Get Started',
                            'button_link' => '/membership/professional',
                        ],
                        [
                            'name' => 'Executive',
                            'price' => '2500',
                            'currency' => 'EGP',
                            'period' => '/month',
                            'featured' => true,
                            'features' => [
                                ['text' => 'Private office suite'],
                                ['text' => 'Dedicated boardroom access'],
                                ['text' => 'Executive lounge privileges'],
                            ],
                            'button_text' => 'Get Started',
                            'button_link' => '/membership/executive',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'pricing_variation_4',
                'data' => [
                    'subtitle' => 'Membership Plans',
                    'title' => 'Premium executive workspace memberships',
                    'button_text' => 'View All Plans',
                    'button_link' => '/pricing',
                    'plans' => [
                        [
                            'name' => 'Professional',
                            'price' => '1500',
                            'currency' => 'EGP',
                            'period' => '/month',
                            'featured' => false,
                            'features' => [
                                ['text' => 'Workspace access', 'has_icon' => true],
                                ['text' => 'Meeting facilities', 'has_icon' => true],
                                ['text' => 'Business support', 'has_icon' => true],
                            ],
                            'button_text' => 'Join Now',
                            'button_link' => '/membership/professional',
                        ],
                    ],
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
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-0',
                            'rating' => 5,
                            'content' => 'This workspace has fundamentally transformed how I conduct business. The environment exudes prestige and inspires excellence in every client meeting.',
                        ],
                        [
                            'author_name' => 'Victoria Blackwood',
                            'author_position' => 'Managing Director, Private Equity',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-0',
                            'rating' => 5,
                            'content' => 'The sophisticated design combined with cutting-edge technology creates an environment where billion-dollar decisions feel natural.',
                        ],
                        [
                            'author_name' => 'James Richardson',
                            'author_position' => 'Founder, Tech Ventures',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-0',
                            'rating' => 5,
                            'content' => 'Every detail reflects excellence. From the hand-selected marble finishes to the impeccable service, this is where success meets sophistication.',
                        ],
                    ],
                    'client_logos' => [
                        ['name' => 'TechCorp', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/client/client-0'],
                        ['name' => 'Global Inc', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/client/client-0'],
                        ['name' => 'Innovation Co', 'logo_color' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/client/client-0'],
                    ],
                ],
            ],
            [
                'type' => 'testimonials_variation_2',
                'data' => [
                    'subtitle' => 'Member Stories',
                    'title' => "Here's what our executive members say",
                    'testimonials' => [
                        [
                            'quote' => 'Outstanding workspace environment with impeccable service. Highly recommended for serious professionals.',
                            'author_name' => 'Jennifer Williams',
                            'author_title' => 'VP Operations, Enterprise Solutions',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-01.jpg',
                            'rating' => 5,
                        ],
                        [
                            'quote' => 'The perfect blend of luxury and functionality. Executive Workspace sets the standard for premium business environments.',
                            'author_name' => 'Robert Martinez',
                            'author_title' => 'Partner, Strategic Advisors',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-02.jpg',
                            'rating' => 5,
                        ],
                    ],
                ],
            ],
            [
                'type' => 'portfolio_grid',
                'data' => [
                    'subtitle' => 'Our Projects',
                    'title' => 'Featured Executive Workspace Designs',
                    'description' => 'Explore our portfolio of distinguished workspace environments.',
                    'limit' => 6,
                    'columns' => 3,
                    'show_category' => true,
                    'show_excerpt' => true,
                ],
            ],
            [
                'type' => 'portfolio_variation_2',
                'data' => [
                    'subtitle' => 'Recent Projects',
                    'title' => 'See our latest case studies',
                    'limit' => 4,
                    'columns' => 2,
                    'show_category' => true,
                    'show_excerpt' => false,
                ],
            ],
            [
                'type' => 'portfolio_variation_3',
                'data' => [
                    'title' => 'Minimalism in Executive Design',
                    'limit' => 6,
                    'columns' => 3,
                    'show_category' => true,
                    'show_excerpt' => true,
                ],
            ],
            [
                'type' => 'portfolio_variation_4',
                'data' => [
                    'subtitle' => 'Case Studies',
                    'title' => 'Selected workspace transformations',
                    'limit' => 4,
                    'columns' => 2,
                    'show_category' => false,
                    'show_excerpt' => true,
                ],
            ],
            [
                'type' => 'process',
                'data' => [
                    'subtitle' => 'Our Approach',
                    'title' => 'How our organization works',
                    'steps' => [
                        [
                            'number' => '01',
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Consultation',
                            'description' => 'We begin with understanding your specific workspace requirements and business objectives.',
                        ],
                        [
                            'number' => '02',
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Planning',
                            'description' => 'Our team develops a customized workspace solution tailored to your needs.',
                        ],
                        [
                            'number' => '03',
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'title' => 'Implementation',
                            'description' => 'We execute the plan with precision, ensuring every detail meets our standards.',
                        ],
                        [
                            'number' => '04',
                            'icon' => 'pbmit-xinterio-icon-house-design',
                            'title' => 'Ongoing Support',
                            'description' => 'Dedicated concierge services ensure your continued success and satisfaction.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'process_variation_2',
                'data' => [
                    'subtitle' => 'Our Process',
                    'title' => 'Your journey to executive excellence',
                    'steps' => [
                        [
                            'number' => '01',
                            'title' => 'Discovery',
                            'description' => 'Understanding your vision and requirements.',
                        ],
                        [
                            'number' => '02',
                            'title' => 'Design',
                            'description' => 'Creating your ideal workspace solution.',
                        ],
                        [
                            'number' => '03',
                            'title' => 'Delivery',
                            'description' => 'Seamless implementation and setup.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'history_timeline',
                'data' => [
                    'subtitle' => 'Our Journey',
                    'title' => 'Evolution of Excellence',
                    'timeline_items' => [
                        [
                            'year' => '2015',
                            'title' => 'Foundation',
                            'description' => 'Executive Workspace established with vision to transform business environments.',
                        ],
                        [
                            'year' => '2018',
                            'title' => 'Expansion',
                            'description' => 'Opened three additional locations across major business districts.',
                        ],
                        [
                            'year' => '2021',
                            'title' => 'Innovation',
                            'description' => 'Introduced smart workspace technology and virtual office solutions.',
                        ],
                        [
                            'year' => '2025',
                            'title' => 'Excellence',
                            'description' => 'Recognized as leading provider of premium executive workspace solutions.',
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
                    'subtitle' => 'Our Advantages',
                    'title' => 'Why choose Executive Workspace',
                    'description' => 'Discover the benefits that set us apart.',
                    'features' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Prime Locations',
                            'description' => 'Prestigious business addresses in the heart of major commercial districts.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Advanced Security',
                            'description' => 'State-of-the-art security systems ensuring safety and privacy.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'title' => 'Smart Technology',
                            'description' => 'Integrated tech solutions for seamless productivity.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-house-design',
                            'title' => '24/7 Support',
                            'description' => 'Dedicated concierge services available around the clock.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'features_slider',
                'data' => [
                    'subtitle' => 'Key Features',
                    'title' => 'Premium workspace amenities',
                    'features' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Executive Offices',
                            'description' => 'Fully furnished private offices with premium furnishings.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-01.jpg',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Meeting Facilities',
                            'description' => 'State-of-the-art boardrooms and conference spaces.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'title' => 'Business Lounges',
                            'description' => 'Comfortable spaces for networking and relaxation.',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-03.jpg',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'icon_box',
                'data' => [
                    'items' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Private Office Suites',
                            'description' => 'Exclusive executive offices with premium furnishings and dedicated support.',
                            'link' => '/services/private-offices',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Boardroom Facilities',
                            'description' => 'Professional meeting spaces equipped with advanced presentation technology.',
                            'link' => '/services/boardrooms',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'title' => 'Executive Lounges',
                            'description' => 'Comfortable areas for informal meetings and business networking.',
                            'link' => '/services/lounges',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'icon_box_variation_2',
                'data' => [
                    'subtitle' => 'Our Services',
                    'title' => 'Premium workspace solutions',
                    'items' => [
                        [
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'title' => 'Executive Suites',
                            'description' => 'Premium private offices designed for business leaders.',
                        ],
                        [
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'title' => 'Smart Technology',
                            'description' => 'Integrated systems for enhanced productivity.',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'accordion',
                'data' => [
                    'subtitle' => 'FAQs',
                    'title' => 'Frequently asked questions',
                    'items' => [
                        [
                            'title' => 'What workspace options are available?',
                            'content' => '<p>We offer private offices, executive suites, shared workspaces, and premium boardrooms. All spaces are fully furnished with high-end amenities.</p>',
                        ],
                        [
                            'title' => 'What amenities are included in membership?',
                            'content' => '<p>All memberships include high-speed internet, printing facilities, refreshments, meeting room access, and dedicated concierge services.</p>',
                        ],
                        [
                            'title' => 'Are there networking opportunities for members?',
                            'content' => '<p>Yes! We host monthly networking events, executive seminars, and exclusive business mixers.</p>',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'tabs',
                'data' => [
                    'subtitle' => 'Our Offerings',
                    'title' => 'Explore workspace solutions',
                    'tabs' => [
                        [
                            'title' => 'Private Offices',
                            'icon' => 'pbmit-xinterio-icon-tools',
                            'content' => '<p>Fully furnished executive offices with premium furnishings and personalized support services.</p>',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-01.jpg',
                        ],
                        [
                            'title' => 'Shared Workspaces',
                            'icon' => 'pbmit-xinterio-icon-hard-hat',
                            'content' => '<p>Flexible workspace solutions in dynamic environments for entrepreneurs and growing teams.</p>',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg',
                        ],
                        [
                            'title' => 'Meeting Rooms',
                            'icon' => 'pbmit-xinterio-icon-offer',
                            'content' => '<p>Professional boardrooms and conference facilities with advanced presentation technology.</p>',
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-03.jpg',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'team',
                'data' => [
                    'subtitle' => 'Our Team',
                    'title' => 'Meet our executive leadership',
                    'description' => 'Industry experts dedicated to your success.',
                    'limit' => 4,
                    'columns' => 4,
                    'show_social' => true,
                    'show_position' => true,
                ],
            ],
            [
                'type' => 'awards',
                'data' => [
                    'subtitle' => 'Recognition',
                    'title' => 'Industry awards and achievements',
                    'awards' => [
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/awards/award-01.png',
                            'title' => 'Best Executive Workspace 2024',
                            'organization' => 'Business Excellence Awards',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/awards/award-02.png',
                            'title' => 'Innovation in Workspace Design',
                            'organization' => 'Design & Architecture Awards',
                        ],
                    ],
                ],
            ],
            [
                'type' => 'awards-award-achievement',
                'data' => [
                    'awards' => [
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/awards/badge-01.png', 'title' => 'Excellence Award'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/awards/badge-02.png', 'title' => 'Innovation Leader'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/awards/badge-03.png', 'title' => 'Client Choice'],
                    ],
                ],
            ],
            [
                'type' => 'clients_logos',
                'data' => [
                    'subtitle' => 'Our Clients',
                    'title' => 'Trusted by industry leaders',
                    'logos' => [
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/client/client-01.png', 'name' => 'TechCorp International'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/client/client-02.png', 'name' => 'Global Consulting Group'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/client/client-03.png', 'name' => 'Innovation Partners'],
                        ['image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/client/client-04.png', 'name' => 'Strategic Advisors'],
                    ],
                ],
            ],
            [
                'type' => 'before_after',
                'data' => [
                    'subtitle' => 'Transformations',
                    'title' => 'Workspace transformations',
                    'before_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/before-after/before.jpg',
                    'after_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/before-after/after.jpg',
                    'before_label' => 'Before',
                    'after_label' => 'After',
                ],
            ],
            [
                'type' => 'cta',
                'data' => [
                    'background_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/cta-bg.jpg',
                    'subtitle' => 'EXCLUSIVE MEMBERSHIP OFFER',
                    'title' => "We create executive spaces so <span id=\"js-rotating\">distinguished, impressive, sophisticated, prestigious</span> you'll elevate your business",
                    'description' => 'Experience the Executive Workspace difference. Schedule your private tour today.',
                    'button_text' => 'Schedule a Tour',
                    'button_link' => '/contact-us',
                    'secondary_button_text' => 'View Plans',
                    'secondary_button_link' => '/pricing',
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
