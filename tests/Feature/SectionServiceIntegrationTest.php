<?php

namespace Tests\Feature;

use App\Services\SectionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionServiceIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_section_service_can_be_resolved_from_container(): void
    {
        $service = app(SectionService::class);

        $this->assertInstanceOf(SectionService::class, $service);
    }

    public function test_section_service_finds_all_created_sections(): void
    {
        $service = app(SectionService::class);
        $sections = $service->getAllSections();

        // Should find our example sections
        $this->assertArrayHasKey('example-hero-section', $sections);
        $this->assertArrayHasKey('example-features-section', $sections);
        $this->assertArrayHasKey('testimonials-client-reviews', $sections);
        $this->assertArrayHasKey('about-company-story', $sections);
        $this->assertArrayHasKey('pricing-plans-section', $sections);

        // Verify we have at least 5 sections
        $this->assertGreaterThanOrEqual(5, count($sections));
    }

    public function test_sections_are_properly_categorized(): void
    {
        $service = app(SectionService::class);
        $categorized = $service->getSectionsByCategory();

        // Should have multiple categories
        $this->assertArrayHasKey('hero', $categorized);
        $this->assertArrayHasKey('features', $categorized);
        $this->assertArrayHasKey('testimonials', $categorized);
        $this->assertArrayHasKey('about', $categorized);
        $this->assertArrayHasKey('pricing', $categorized);

        // Verify sections are in correct categories
        $heroSections = collect($categorized['hero'])->pluck('name')->toArray();
        $this->assertContains('example-hero-section', $heroSections);

        $featureSections = collect($categorized['features'])->pluck('name')->toArray();
        $this->assertContains('example-features-section', $featureSections);

        $testimonialSections = collect($categorized['testimonials'])->pluck('name')->toArray();
        $this->assertContains('testimonials-client-reviews', $testimonialSections);
    }

    public function test_section_rendering_works_with_settings(): void
    {
        $service = app(SectionService::class);

        $testSettings = [
            'general' => [
                'hero_title' => 'Integration Test Title',
                'hero_subtitle' => 'Integration Test Subtitle',
            ],
        ];

        $rendered = $service->renderSection('example-hero-section', ['settings' => $testSettings]);

        $this->assertStringContainsString('Integration Test Title', $rendered);
        $this->assertStringContainsString('Integration Test Subtitle', $rendered);
        $this->assertStringContainsString('<section class="hero-section">', $rendered);
    }

    public function test_section_options_for_forms(): void
    {
        $service = app(SectionService::class);

        // Test simple options
        $options = $service->getSectionOptions();
        $this->assertIsArray($options);
        $this->assertNotEmpty($options);

        // Test grouped options
        $grouped = $service->getGroupedSectionOptions();
        $this->assertIsArray($grouped);
        $this->assertNotEmpty($grouped);

        // Each group should have sections
        foreach ($grouped as $category => $sections) {
            $this->assertIsString($category);
            $this->assertIsArray($sections);
            $this->assertNotEmpty($sections);
        }
    }

    public function test_section_service_handles_missing_sections_gracefully(): void
    {
        $service = app(SectionService::class);

        $this->assertFalse($service->sectionExists('non-existent-section'));
        $this->assertNull($service->getSectionMetadata('non-existent-section'));

        $rendered = $service->renderSection('non-existent-section');
        $this->assertStringContainsString('Section \'non-existent-section\' not found', $rendered);
    }
}
