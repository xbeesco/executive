<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Enums\ContentStatus;
use Illuminate\Database\Seeder;

class TestBlockPagesSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            // About Block 1
            [
                'type' => 'about',
                'data' => [
                    'subtitle' => 'Executive Wellness',
                    'title' => 'Start your balanced executive lifestyle today',
                    'content' => 'We understand that peak performance requires holistic well-being. Our workspace integrates comprehensive wellness amenities with business functionality, creating environments where health and productivity coexist harmoniously.',
                    'year' => '2015',
                    'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/img01.jpg',
                    'image_2' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/img02.jpg',
                    'features' => [
                        ['text' => 'Global Locations Across 25+ Cities'],
                        ['text' => '5,000+ Distinguished Members Served'],
                    ],
                ],
            ],
            // About Variation 2
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
            // Testimonials
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
                            'rating' => '5',
                            'content' => 'This workspace has fundamentally transformed how I conduct business. The environment exudes prestige and inspires excellence in every client meeting. My productivity has increased substantially since relocating here.',
                        ],
                        [
                            'author_name' => 'Victoria Sterling',
                            'author_position' => 'Managing Partner, Law Firm',
                            'author_image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-2/reviewer/reviewer-02.jpg',
                            'rating' => '5',
                            'content' => 'The attention to detail is exceptional. From the concierge service to the state-of-the-art facilities, every aspect reflects the premium quality our clients expect from us.',
                        ],
                    ],
                ],
            ],
            // Services Grid
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
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-02.jpg',
                            'number' => '02',
                            'category' => 'Meeting Space',
                            'title' => 'Conference Rooms',
                            'link' => 'service-details.html',
                        ],
                        [
                            'image' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/homepage-3/service/service-03.jpg',
                            'number' => '03',
                            'category' => 'Flexible Space',
                            'title' => 'Hot Desking',
                            'link' => 'service-details.html',
                        ],
                    ],
                ],
            ],
            // CTA
            [
                'type' => 'cta',
                'data' => [
                    'title' => 'We transform professional spaces into executive environments.',
                    'button_text' => 'Get Started',
                    'button_link' => '#',
                    'phone' => '1-800-EXEC',
                    'phone_label' => 'Call Us Today',
                ],
            ],
            // Spacer
            [
                'type' => 'spacer',
                'data' => [
                    'size' => 'section-xl',
                ],
            ],
        ];

        // Create Static Test Page
        Page::updateOrCreate(
            ['slug' => 'test-blocks-static'],
            [
                'title' => 'Test Blocks - Static Version',
                'content' => $blocks,
                'status' => ContentStatus::PUBLISHED,
                'settings' => [
                    'is_archive' => 0,
                    'header_style' => 3,
                    'footer_style' => 2,
                    'use_demo_sections' => true,
                ],
                'seo' => ['meta_title' => 'Test Blocks Static'],
            ]
        );

        // Create Dynamic Test Page
        Page::updateOrCreate(
            ['slug' => 'test-blocks-dynamic'],
            [
                'title' => 'Test Blocks - Dynamic Version',
                'content' => $blocks,
                'status' => ContentStatus::PUBLISHED,
                'settings' => [
                    'is_archive' => 0,
                    'header_style' => 3,
                    'footer_style' => 2,
                    'use_demo_sections' => false,
                ],
                'seo' => ['meta_title' => 'Test Blocks Dynamic'],
            ]
        );

        echo "Test pages created with " . count($blocks) . " blocks!\n";
        echo "Static: /test-blocks-static\n";
        echo "Dynamic: /test-blocks-dynamic\n";
    }
}
