<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class SectionService
{
    protected string $sectionsPath;

    protected array $sectionCache = [];

    public function __construct()
    {
        $this->sectionsPath = resource_path('views/sections');
    }

    /**
     * Get all available sections
     */
    public function getAllSections(): array
    {
        if (! empty($this->sectionCache)) {
            return $this->sectionCache;
        }

        $sections = [];

        if (! File::exists($this->sectionsPath)) {
            return $sections;
        }

        $files = File::allFiles($this->sectionsPath);

        foreach ($files as $file) {
            if ($file->getExtension() === 'php') {
                $relativePath = str_replace($this->sectionsPath.DIRECTORY_SEPARATOR, '', $file->getPathname());
                $relativePath = str_replace('\\', '/', $relativePath); // Normalize path separators
                $sectionName = str_replace(['\\', '/', '.blade'], ['.', '.', ''], pathinfo($relativePath, PATHINFO_FILENAME));

                $sections[$sectionName] = [
                    'name' => $sectionName,
                    'title' => $this->generateTitle($sectionName),
                    'category' => $this->determineCategory($sectionName),
                    'path' => $relativePath,
                    'file' => $file->getPathname(),
                ];
            }
        }

        $this->sectionCache = $sections;

        return $sections;
    }

    /**
     * Get sections organized by category
     */
    public function getSectionsByCategory(): array
    {
        $sections = $this->getAllSections();
        $categorized = [];

        foreach ($sections as $section) {
            $category = $section['category'];
            if (! isset($categorized[$category])) {
                $categorized[$category] = [];
            }
            $categorized[$category][] = $section;
        }

        return $categorized;
    }

    /**
     * Get metadata for a specific section
     */
    public function getSectionMetadata(string $sectionName): ?array
    {
        $sections = $this->getAllSections();

        return $sections[$sectionName] ?? null;
    }

    /**
     * Check if a section exists
     */
    public function sectionExists(string $sectionName): bool
    {
        return $this->getSectionMetadata($sectionName) !== null;
    }

    /**
     * Render a section with provided data
     */
    public function renderSection(string $sectionName, array $data = []): string
    {
        if (! $this->sectionExists($sectionName)) {
            return "<!-- Section '{$sectionName}' not found -->";
        }

        try {
            $viewName = 'sections.'.$sectionName;

            if (! View::exists($viewName)) {
                return "<!-- Section view '{$viewName}' not found -->";
            }

            return View::make($viewName, $data)->render();
        } catch (\Exception $e) {
            return "<!-- Error rendering section '{$sectionName}': {$e->getMessage()} -->";
        }
    }

    /**
     * Get sections for a specific category
     */
    public function getSectionsBySpecificCategory(string $category): array
    {
        $sections = $this->getAllSections();

        return array_filter($sections, function ($section) use ($category) {
            return $section['category'] === $category;
        });
    }

    /**
     * Get available categories
     */
    public function getCategories(): array
    {
        $sections = $this->getAllSections();
        $categories = array_unique(array_column($sections, 'category'));
        sort($categories);

        return $categories;
    }

    /**
     * Clear the section cache
     */
    public function clearCache(): void
    {
        $this->sectionCache = [];
    }

    /**
     * Generate a human-readable title from section name
     */
    protected function generateTitle(string $sectionName): string
    {
        // Convert dots and dashes to spaces, then title case
        $title = str_replace(['.', '-', '_'], ' ', $sectionName);

        return Str::title($title);
    }

    /**
     * Determine category based on section name patterns
     */
    protected function determineCategory(string $sectionName): string
    {
        $name = strtolower($sectionName);

        // Hero sections
        if (Str::contains($name, ['hero', 'slider', 'banner', 'main-banner'])) {
            return 'hero';
        }

        // Feature sections
        if (Str::contains($name, ['feature', 'service', 'offer', 'what-we', 'why-choose'])) {
            return 'features';
        }

        // About sections
        if (Str::contains($name, ['about', 'company', 'history', 'beginning', 'story'])) {
            return 'about';
        }

        // Testimonial sections
        if (Str::contains($name, ['testimonial', 'client', 'review', 'feedback'])) {
            return 'testimonials';
        }

        // Portfolio/Case studies
        if (Str::contains($name, ['portfolio', 'case', 'project', 'work', 'gallery'])) {
            return 'portfolio';
        }

        // Team sections
        if (Str::contains($name, ['team', 'staff', 'member', 'designer'])) {
            return 'team';
        }

        // Pricing sections
        if (Str::contains($name, ['pricing', 'plan', 'package', 'cost'])) {
            return 'pricing';
        }

        // Contact sections
        if (Str::contains($name, ['contact', 'address', 'location', 'phone'])) {
            return 'contact';
        }

        // Stats/Numbers sections
        if (Str::contains($name, ['stat', 'number', 'counter', 'achievement', 'award'])) {
            return 'stats';
        }

        // Blog/News sections
        if (Str::contains($name, ['blog', 'news', 'article', 'post'])) {
            return 'blog';
        }

        // Default category
        return 'general';
    }

    /**
     * Get section options for form select components
     */
    public function getSectionOptions(): array
    {
        $sections = $this->getAllSections();
        $options = [];

        foreach ($sections as $section) {
            $options[$section['name']] = $section['title'].' ('.ucfirst($section['category']).')';
        }

        return $options;
    }

    /**
     * Get section options grouped by category for form select components
     */
    public function getGroupedSectionOptions(): array
    {
        $categorized = $this->getSectionsByCategory();
        $grouped = [];

        foreach ($categorized as $category => $sections) {
            $categoryTitle = Str::title($category);
            $grouped[$categoryTitle] = [];

            foreach ($sections as $section) {
                $grouped[$categoryTitle][$section['name']] = $section['title'];
            }
        }

        return $grouped;
    }
}
