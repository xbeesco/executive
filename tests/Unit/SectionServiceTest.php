<?php

namespace Tests\Unit;

use App\Services\SectionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionServiceTest extends TestCase
{
    use RefreshDatabase;

    protected SectionService $sectionService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sectionService = new SectionService;
    }

    public function test_can_get_all_sections(): void
    {
        $sections = $this->sectionService->getAllSections();

        $this->assertIsArray($sections);
        $this->assertArrayHasKey('example-hero-section', $sections);
        $this->assertArrayHasKey('example-features-section', $sections);
    }

    public function test_section_metadata_structure(): void
    {
        $sections = $this->sectionService->getAllSections();

        if (! empty($sections)) {
            $firstSection = array_values($sections)[0];

            $this->assertArrayHasKey('name', $firstSection);
            $this->assertArrayHasKey('title', $firstSection);
            $this->assertArrayHasKey('category', $firstSection);
            $this->assertArrayHasKey('path', $firstSection);
            $this->assertArrayHasKey('file', $firstSection);
        }
    }

    public function test_can_get_sections_by_category(): void
    {
        $categorized = $this->sectionService->getSectionsByCategory();

        $this->assertIsArray($categorized);

        foreach ($categorized as $category => $sections) {
            $this->assertIsString($category);
            $this->assertIsArray($sections);

            foreach ($sections as $section) {
                $this->assertEquals($category, $section['category']);
            }
        }
    }

    public function test_can_check_section_exists(): void
    {
        $this->assertTrue($this->sectionService->sectionExists('example-hero-section'));
        $this->assertTrue($this->sectionService->sectionExists('example-features-section'));
        $this->assertFalse($this->sectionService->sectionExists('non-existent-section'));
    }

    public function test_can_get_section_metadata(): void
    {
        $metadata = $this->sectionService->getSectionMetadata('example-hero-section');

        $this->assertIsArray($metadata);
        $this->assertEquals('example-hero-section', $metadata['name']);
        $this->assertEquals('Example Hero Section', $metadata['title']);
        $this->assertEquals('hero', $metadata['category']);
    }

    public function test_can_get_categories(): void
    {
        $categories = $this->sectionService->getCategories();

        $this->assertIsArray($categories);
        $this->assertContains('hero', $categories);
        $this->assertContains('features', $categories);
    }

    public function test_can_get_section_options(): void
    {
        $options = $this->sectionService->getSectionOptions();

        $this->assertIsArray($options);
        $this->assertArrayHasKey('example-hero-section', $options);
        $this->assertStringContainsString('Example Hero Section', $options['example-hero-section']);
    }

    public function test_can_get_grouped_section_options(): void
    {
        $grouped = $this->sectionService->getGroupedSectionOptions();

        $this->assertIsArray($grouped);

        foreach ($grouped as $category => $sections) {
            $this->assertIsString($category);
            $this->assertIsArray($sections);
        }
    }

    public function test_can_render_section(): void
    {
        $rendered = $this->sectionService->renderSection('example-hero-section', [
            'settings' => [
                'general' => [
                    'hero_title' => 'Test Title',
                    'hero_subtitle' => 'Test Subtitle',
                ],
            ],
        ]);

        $this->assertIsString($rendered);
        $this->assertStringContainsString('Test Title', $rendered);
        $this->assertStringContainsString('Test Subtitle', $rendered);
    }

    public function test_render_non_existent_section_returns_comment(): void
    {
        $rendered = $this->sectionService->renderSection('non-existent-section');

        $this->assertStringContainsString('Section \'non-existent-section\' not found', $rendered);
    }

    public function test_category_determination(): void
    {
        // Test hero category
        $sections = $this->sectionService->getAllSections();
        $heroSection = $sections['example-hero-section'] ?? null;
        $this->assertNotNull($heroSection);
        $this->assertEquals('hero', $heroSection['category']);

        // Test features category
        $featuresSection = $sections['example-features-section'] ?? null;
        $this->assertNotNull($featuresSection);
        $this->assertEquals('features', $featuresSection['category']);
    }

    public function test_can_clear_cache(): void
    {
        // Load sections to populate cache
        $this->sectionService->getAllSections();

        // Clear cache
        $this->sectionService->clearCache();

        // Should still work after clearing cache
        $sections = $this->sectionService->getAllSections();
        $this->assertIsArray($sections);
    }
}
