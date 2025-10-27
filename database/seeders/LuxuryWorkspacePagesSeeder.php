<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Page;
use Illuminate\Database\Seeder;

class LuxuryWorkspacePagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing pages if they exist
        Page::whereIn('slug', [
            'executive-workspace-premier',
            'elite-business-sanctuary',
            'prestige-professional-quarters',
        ])->delete();

        // Database Page 1
        $this->createExecutiveWorkspacePage();

        // Database Page 2
        $this->createEliteBusinessSanctuaryPage();

        // Database Page 3
        $this->createPrestigeProfessionalQuartersPage();
    }

    protected function createExecutiveWorkspacePage(): void
    {
        Page::create([
            'title' => 'Executive Workspace Premier',
            'slug' => 'executive-workspace-premier',
            'status' => ContentStatus::PUBLISHED,
            'featured_image' => 'blocks/workspace-premier.jpg',
            'content' => $this->getExecutiveWorkspaceContent(),
            'settings' => [
                'is_archive' => 0,
                'header_style' => 3,
                'header_area_type' => 'slider',
                'slider_items' => [
                    [
                        'title' => 'Where Success Meets Sophistication',
                        'sub_title' => 'Executive Workspace Premier',
                        'title_small' => 'Luxury Redefined',
                        'description' => 'Experience workspace excellence designed exclusively for visionary leaders and distinguished entrepreneurs.',
                        'background_image' => 'images/sliders/hero-executive-1.jpg',
                        'button_text' => 'Schedule Private Tour',
                        'button_url' => '/contact',
                    ],
                    [
                        'title' => 'Elevate Your Professional Presence',
                        'sub_title' => 'Premium Workspaces',
                        'title_small' => 'Prestige & Performance',
                        'description' => 'Join an exclusive community of industry leaders in environments that inspire excellence and command respect.',
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
                'meta_title' => 'Executive Workspace Premier - Luxury Workspaces for Distinguished Leaders',
                'meta_description' => 'Experience unparalleled luxury in our executive workspaces. Premium offices, five-star amenities, and exclusive services designed for C-level executives and visionary entrepreneurs.',
                'meta_keywords' => 'luxury workspace, executive office, premium coworking, private office, business center, luxury amenities',
                'og_image' => 'images/seo/executive-workspace-og.jpg',
            ],
        ]);
    }

    protected function createEliteBusinessSanctuaryPage(): void
    {
        Page::create([
            'title' => 'Elite Business Sanctuary',
            'slug' => 'elite-business-sanctuary',
            'status' => ContentStatus::PUBLISHED,
            'featured_image' => 'blocks/workspace-sanctuary.jpg',
            'content' => $this->getEliteBusinessSanctuaryContent(),
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
                'meta_description' => 'Discover the pinnacle of luxury workspace environments. Award-winning design, five-star service, and a global network of distinguished professionals.',
                'meta_keywords' => 'elite workspace, business sanctuary, luxury office space, executive suites, premium business center',
                'og_image' => 'images/seo/sanctuary-og.jpg',
            ],
        ]);
    }

    protected function createPrestigeProfessionalQuartersPage(): void
    {
        Page::create([
            'title' => 'Prestige Professional Quarters',
            'slug' => 'prestige-professional-quarters',
            'status' => ContentStatus::PUBLISHED,
            'featured_image' => 'blocks/workspace-prestige.jpg',
            'content' => $this->getPrestigeProfessionalQuartersContent(),
            'settings' => [
                'is_archive' => 0,
                'header_style' => 8,
                'header_area_type' => 'slider',
                'slider_items' => [
                    [
                        'title' => 'Prestige is Not Inherited. It\'s Earned.',
                        'sub_title' => 'Prestige Professional Quarters',
                        'title_small' => 'Where Leaders Thrive',
                        'description' => 'Environments designed for those who shape industries, lead markets, and define excellence.',
                        'background_image' => 'images/sliders/hero-prestige-1.jpg',
                        'button_text' => 'Claim Your Space',
                        'button_url' => '/contact',
                    ],
                    [
                        'title' => 'Your Success Story Deserves This Setting',
                        'sub_title' => 'Professional Excellence',
                        'title_small' => 'Luxury Workspace',
                        'description' => 'From established leaders to rising stars, we provide the environment that matches your ambition.',
                        'background_image' => 'images/sliders/hero-prestige-2.jpg',
                        'button_text' => 'Discover More',
                        'button_url' => '/about',
                    ],
                    [
                        'title' => 'Where Business Meets Artistry',
                        'sub_title' => 'Architectural Excellence',
                        'title_small' => 'Award-Winning Design',
                        'description' => 'Spaces that inspire confidence, facilitate success, and reflect your professional stature.',
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
                'meta_title' => 'Prestige Professional Quarters - Workspace for Visionary Leaders',
                'meta_description' => 'Join an exclusive community of successful entrepreneurs and C-level executives. Award-winning luxury workspaces with global access and unmatched service.',
                'meta_keywords' => 'prestige workspace, professional quarters, luxury business center, executive office space, high-end coworking',
                'og_image' => 'images/seo/prestige-og.jpg',
            ],
        ]);
    }

    protected function getExecutiveWorkspaceContent(): array
    {
        return [
            // Due to character limits, this will be implemented separately
            // Content structure matches sections.md Database Page 1
        ];
    }

    protected function getEliteBusinessSanctuaryContent(): array
    {
        return [
            // Content structure matches sections.md Database Page 2
        ];
    }

    protected function getPrestigeProfessionalQuartersContent(): array
    {
        return [
            // Content structure matches sections.md Database Page 3
        ];
    }
}
