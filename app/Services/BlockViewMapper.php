<?php

namespace App\Services;

class BlockViewMapper
{
    /**
     * Mapping between block types and their corresponding view files.
     * Based on sections.md and existing view files.
     */
    protected static array $mapping = [
        // Slider & Hero
        'slider' => 'sections.about-modern-living-area',
        'hero' => 'sections.faq-transforming-dull-spaces',

        // About variations
        'about' => 'sections.about-start-your-healthy-life',
        'about_variation_2' => 'sections.about-transforming-dull',
        'about_variation_3' => 'sections.about-we-design-thoughtful',
        'about_variation_4' => 'sections.about-exceptional-designing',

        // Accordion & Tabs
        'accordion' => 'sections.pricing-creating-the-art-of',
        'tabs' => 'sections.services-what-can-we-offer',

        // Testimonials
        'testimonials' => 'sections.testimonials-hear-from-clients',
        'testimonials_variation_2' => 'sections.testimonials-heres-what-our',

        // Services Grid variations
        'services_grid' => 'sections.pricing-different-case',
        'services_grid_variation_2' => 'sections.pricing-creating-the',
        'services_grid_variation_3' => 'sections.pricing-what-we-offer-for-2',
        'services_grid_variation_4' => 'sections.pricing-what-can-we-offer',

        // Services & Services Slider
        'services' => 'sections.pricing-making-your-home',
        'services_variation_2' => 'sections.pricing-thoughtful-livable-spaces-design',
        'services_variation_3' => 'sections.pricing-we-design',
        'services_slider' => 'sections.pricing-what-we-offer-for',

        // Process
        'process' => 'sections.services-get-amazing-cleaning',
        'process_variation_2' => 'sections.process-how-organization-works',

        // Portfolio Grid variations
        'portfolio_grid' => 'sections.portfolio-see-our-latest-case',
        'portfolio_variation_2' => 'sections.portfolio-minimalism',
        'portfolio_variation_3' => 'sections.portfolio-see-our-latest-case-2',
        'portfolio_variation_4' => 'sections.portfolio-selected-case',

        // Features
        'features_grid' => 'sections.pricing-why-choose',
        'features_slider' => 'sections.pricing-design-without-limits',

        // Icon Box
        'icon_box' => 'sections.about-the-advantages-of',
        'icon_box_variation_2' => 'sections.about-the-advantages-of-our',

        // Pricing Table variations
        'pricing_table' => 'sections.pricing-the-best-pricing',
        'pricing_variation_2' => 'sections.pricing-choose-plan-for',
        'pricing_variation_3' => 'sections.pricing-choose-plan-for-house',
        'pricing_variation_4' => 'sections.pricing-examination-package',

        // Other Components
        'before_after' => 'sections.section-we-design-thoughtful',
        'awards' => 'sections.awards-award-achievement',
        'cta' => 'sections.cta-we-making-home',
        'history_timeline' => 'sections.about-our-beginning',
        'clients_logos' => 'sections.section-join-the-companies-that',
        'team' => 'sections.team-meet-designer',
        'static' => 'sections.static',

        // Utility Components
        'text_content' => 'sections.text-content',
        'spacer' => 'sections.spacer',

        // Dynamic Content Components
        'posts_grid' => 'sections.posts-grid',
        'events_grid' => 'sections.events-grid',

        // Content Blocks (for single pages - no section wrappers)
        'content_text' => 'sections.content.content_text',
        'content_image' => 'sections.content.content_image',
        'content_gallery' => 'sections.content.content_gallery',
        'content_list' => 'sections.content.content_list',
        'content_quote' => 'sections.content.content_quote',
        'content_accordion' => 'sections.content.content_accordion',
        'content_video' => 'sections.content.content_video',
        'content_divider' => 'sections.content.content_divider',
    ];

    /**
     * Get the view name for a given block type.
     */
    public function getViewName(string $blockType): string
    {
        return self::$mapping[$blockType] ?? "sections.{$blockType}";
    }

    /**
     * Check if a block type has a mapped view.
     */
    public function hasMapping(string $blockType): bool
    {
        return isset(self::$mapping[$blockType]);
    }

    /**
     * Get all mappings.
     */
    public function getAllMappings(): array
    {
        return self::$mapping;
    }

    /**
     * Get the original view file name (without 'sections.' prefix).
     */
    public function getViewFileName(string $blockType): string
    {
        $viewName = $this->getViewName($blockType);

        return str_replace('sections.', '', $viewName);
    }
}
