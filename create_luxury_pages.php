<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Enums\ContentStatus;
use App\Models\Page;

// Delete test page
Page::where('slug', 'executive-workspace-test')->delete();

// Delete existing pages if they exist
Page::whereIn('slug', [
    'executive-workspace-premier',
    'elite-business-sanctuary',
    'prestige-professional-quarters',
])->delete();

echo "Creating luxury workspace pages...\n\n";

// Page 1: Executive Workspace Premier
echo "Creating Page 1: Executive Workspace Premier...\n";
$page1 = Page::create([
    'title' => 'Executive Workspace Premier',
    'slug' => 'executive-workspace-premier',
    'status' => ContentStatus::PUBLISHED,
    'featured_image' => 'blocks/workspace-premier.jpg',
    'content' => require __DIR__.'/database/seeders/content/page1_content.php',
    'settings' => [
        'is_archive' => 0,
        'header_style' => 3,
        'header_area_type' => 'slider',
        'slider_items' => [
            [
                'title' => 'Where Success Meets Sophistication',
                'sub_title' => 'Executive Workspace Premier',
                'title_small' => 'Luxury Redefined',
                'description' => 'Experience workspace excellence designed exclusively for visionary leaders.',
                'background_image' => 'images/sliders/hero-executive-1.jpg',
                'button_text' => 'Schedule Private Tour',
                'button_url' => '/contact',
            ],
            [
                'title' => 'Elevate Your Professional Presence',
                'sub_title' => 'Premium Workspaces',
                'title_small' => 'Prestige & Performance',
                'description' => 'Join an exclusive community of industry leaders.',
                'background_image' => 'images/sliders/hero-executive-2.jpg',
                'button_text' => 'Explore Locations',
                'button_url' => '/locations',
            ],
        ],
        'footer_style' => 2,
        'footer_bg_color' => 'dark',
        'container_type' => 'container-fluid',
        'show_sidebar' => 0,
    ],
    'seo' => [
        'meta_title' => 'Executive Workspace Premier - Luxury Workspaces',
        'meta_description' => 'Experience unparalleled luxury in our executive workspaces.',
        'meta_keywords' => 'luxury workspace, executive office, premium coworking',
        'og_image' => 'images/seo/executive-workspace-og.jpg',
    ],
]);
echo "✓ Page 1 created (ID: {$page1->id})\n";
echo "  URL: http://exe-site.test/pages/executive-workspace-premier\n\n";

// Page 2: Elite Business Sanctuary
echo "Creating Page 2: Elite Business Sanctuary...\n";
$page2 = Page::create([
    'title' => 'Elite Business Sanctuary',
    'slug' => 'elite-business-sanctuary',
    'status' => ContentStatus::PUBLISHED,
    'featured_image' => 'blocks/workspace-sanctuary.jpg',
    'content' => require __DIR__.'/database/seeders/content/page2_content.php',
    'settings' => [
        'is_archive' => 0,
        'header_style' => 4,
        'header_area_type' => 'title_bar',
        'title_bar_title' => 'Elite Business Sanctuary',
        'title_bar_bg_image' => 'images/title-bars/sanctuary-hero.jpg',
        'show_breadcrumbs' => 1,
        'footer_style' => 3,
        'footer_bg_color' => 'secondary',
        'container_type' => 'container',
        'show_sidebar' => 0,
    ],
    'seo' => [
        'meta_title' => 'Elite Business Sanctuary - Where Excellence is Standard',
        'meta_description' => 'Discover the pinnacle of luxury workspace environments.',
        'meta_keywords' => 'elite workspace, business sanctuary, luxury office space',
        'og_image' => 'images/seo/sanctuary-og.jpg',
    ],
]);
echo "✓ Page 2 created (ID: {$page2->id})\n";
echo "  URL: http://exe-site.test/pages/elite-business-sanctuary\n\n";

// Page 3: Prestige Professional Quarters
echo "Creating Page 3: Prestige Professional Quarters...\n";
$page3 = Page::create([
    'title' => 'Prestige Professional Quarters',
    'slug' => 'prestige-professional-quarters',
    'status' => ContentStatus::PUBLISHED,
    'featured_image' => 'blocks/workspace-prestige.jpg',
    'content' => require __DIR__.'/database/seeders/content/page3_content.php',
    'settings' => [
        'is_archive' => 0,
        'header_style' => 8,
        'header_area_type' => 'slider',
        'slider_items' => [
            [
                'title' => 'Prestige is Not Inherited. It\'s Earned.',
                'sub_title' => 'Prestige Professional Quarters',
                'title_small' => 'Where Leaders Thrive',
                'description' => 'Environments designed for those who shape industries.',
                'background_image' => 'images/sliders/hero-prestige-1.jpg',
                'button_text' => 'Claim Your Space',
                'button_url' => '/contact',
            ],
            [
                'title' => 'Your Success Story Deserves This Setting',
                'sub_title' => 'Professional Excellence',
                'title_small' => 'Luxury Workspace',
                'description' => 'We provide the environment that matches your ambition.',
                'background_image' => 'images/sliders/hero-prestige-2.jpg',
                'button_text' => 'Discover More',
                'button_url' => '/about',
            ],
            [
                'title' => 'Where Business Meets Artistry',
                'sub_title' => 'Architectural Excellence',
                'title_small' => 'Award-Winning Design',
                'description' => 'Spaces that reflect your professional stature.',
                'background_image' => 'images/sliders/hero-prestige-3.jpg',
                'button_text' => 'View Locations',
                'button_url' => '/locations',
            ],
        ],
        'footer_style' => 8,
        'footer_bg_color' => 'light',
        'container_type' => 'container',
        'show_sidebar' => 0,
    ],
    'seo' => [
        'meta_title' => 'Prestige Professional Quarters - Workspace for Leaders',
        'meta_description' => 'Join an exclusive community of successful entrepreneurs.',
        'meta_keywords' => 'prestige workspace, professional quarters, luxury business center',
        'og_image' => 'images/seo/prestige-og.jpg',
    ],
]);
echo "✓ Page 3 created (ID: {$page3->id})\n";
echo "  URL: http://exe-site.test/pages/prestige-professional-quarters\n\n";

echo "✅ All 3 luxury workspace pages created successfully!\n";
echo "\nYou can now access them at:\n";
echo "1. http://exe-site.test/pages/executive-workspace-premier\n";
echo "2. http://exe-site.test/pages/elite-business-sanctuary\n";
echo "3. http://exe-site.test/pages/prestige-professional-quarters\n";
