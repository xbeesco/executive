<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing categories (except if you want to keep them)
        // Category::truncate();

        $categories = [
            [
                'name' => 'Executive Suites',
                'slug' => 'executive-suites',
                'description' => 'Premium private offices designed for C-level executives and senior management, featuring luxury finishes and state-of-the-art amenities.',
                'parent_id' => null,
            ],
            [
                'name' => 'Financial Services',
                'slug' => 'financial-services',
                'description' => 'Specialized workspace solutions for banking institutions, investment firms, and wealth management organizations requiring security and sophistication.',
                'parent_id' => null,
            ],
            [
                'name' => 'Legal Practice',
                'slug' => 'legal-practice',
                'description' => 'Professional office environments tailored for law firms and legal practitioners, combining confidentiality with prestigious presentation.',
                'parent_id' => null,
            ],
            [
                'name' => 'Technology Hub',
                'slug' => 'technology-hub',
                'description' => 'Modern, innovative spaces for tech startups and established technology enterprises, equipped with cutting-edge infrastructure.',
                'parent_id' => null,
            ],
            [
                'name' => 'Healthcare & Wellness',
                'slug' => 'healthcare-wellness',
                'description' => 'Specialized medical practices and wellness centers featuring clinical-grade facilities in a luxury setting.',
                'parent_id' => null,
            ],
            [
                'name' => 'Corporate Consulting',
                'slug' => 'corporate-consulting',
                'description' => 'Strategic consulting offices designed for management consultants and business advisory firms serving Fortune 500 clients.',
                'parent_id' => null,
            ],
            [
                'name' => 'Creative Studios',
                'slug' => 'creative-studios',
                'description' => 'Inspiring workspace for design agencies, media production companies, and creative professionals.',
                'parent_id' => null,
            ],
            [
                'name' => 'International Trade',
                'slug' => 'international-trade',
                'description' => 'Global business operation centers for import/export enterprises and international commerce organizations.',
                'parent_id' => null,
            ],
            [
                'name' => 'Real Estate Development',
                'slug' => 'real-estate',
                'description' => 'Premium offices for property developers and real estate investment firms managing high-value portfolios.',
                'parent_id' => null,
            ],
            [
                'name' => 'Private Equity',
                'slug' => 'private-equity',
                'description' => 'Exclusive workspace for private equity firms, venture capital organizations, and institutional investors.',
                'parent_id' => null,
            ],
            [
                'name' => 'Luxury Retail',
                'slug' => 'luxury-retail',
                'description' => 'Sophisticated headquarters for high-end fashion houses, luxury brands, and premium lifestyle companies.',
                'parent_id' => null,
            ],
            [
                'name' => 'Entertainment & Media',
                'slug' => 'entertainment-media',
                'description' => 'Executive offices for production companies, talent agencies, and entertainment industry leaders.',
                'parent_id' => null,
            ],
            [
                'name' => 'Architecture & Design',
                'slug' => 'architecture-design',
                'description' => 'Workspace solutions for architectural firms and interior design studios showcasing creative excellence.',
                'parent_id' => null,
            ],
            [
                'name' => 'Hospitality Management',
                'slug' => 'hospitality',
                'description' => 'Corporate headquarters for hotel groups, restaurant chains, and hospitality management companies.',
                'parent_id' => null,
            ],
            [
                'name' => 'Innovation Labs',
                'slug' => 'innovation-labs',
                'description' => 'Research and development centers for innovation-driven enterprises and cutting-edge technology pioneers.',
                'parent_id' => null,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        $this->command->info('Successfully seeded ' . count($categories) . ' professional workspace categories.');
    }
}
