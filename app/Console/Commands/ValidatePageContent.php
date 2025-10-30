<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Console\Command;

class ValidatePageContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validate:page-content {page_id? : The ID of the page to validate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validate page content structure and category references';

    /**
     * Portfolio block types that contain category data
     */
    protected array $portfolioBlocks = [
        'portfolio_grid',
        'portfolio_variation_2',
        'portfolio_variation_3',
        'portfolio_variation_4',
    ];

    /**
     * Deprecated fields that should not exist
     */
    protected array $deprecatedFields = [
        'category_label',
        'category_display',
        'category_link',
        'category_slug', // replaced by 'category'
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pageId = $this->argument('page_id');

        if ($pageId) {
            $pages = Page::where('id', $pageId)->get();
            if ($pages->isEmpty()) {
                $this->error("Page #{$pageId} not found!");
                return 1;
            }
        } else {
            $pages = Page::all();
            $this->info("Validating all pages...\n");
        }

        $validCategorySlugs = Category::pluck('slug')->toArray();
        $totalIssues = 0;

        foreach ($pages as $page) {
            $issues = $this->validatePage($page, $validCategorySlugs);
            $totalIssues += $issues;
        }

        $this->newLine();
        if ($totalIssues === 0) {
            $this->info('✅ All pages are 100% compatible! No issues found.');
            return 0;
        } else {
            $this->error("⚠️  Total issues found: {$totalIssues}");
            return 1;
        }
    }

    /**
     * Validate a single page
     */
    protected function validatePage(Page $page, array $validCategorySlugs): int
    {
        $this->line("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");
        $this->info("Validating Page #{$page->id}: {$page->title}");
        $this->line("━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━");

        if (empty($page->content) || !is_array($page->content)) {
            $this->warn("  ⚠️  Page has no content blocks");
            return 0;
        }

        $pageIssues = 0;

        foreach ($page->content as $blockIndex => $block) {
            $blockType = $block['type'] ?? 'unknown';

            if (!in_array($blockType, $this->portfolioBlocks)) {
                continue;
            }

            $this->line("\n  📦 Block #{$blockIndex} ({$blockType}):");

            $blockIssues = $this->validateBlock($block, $validCategorySlugs);
            $pageIssues += $blockIssues;

            if ($blockIssues === 0) {
                $this->info("     ✅ Block is valid");
            }
        }

        if ($pageIssues === 0) {
            $this->info("\n  ✅ Page is 100% compatible\n");
        } else {
            $this->error("\n  ❌ Page has {$pageIssues} issue(s)\n");
        }

        return $pageIssues;
    }

    /**
     * Validate a single block
     */
    protected function validateBlock(array $block, array $validCategorySlugs): int
    {
        $issues = 0;
        $data = $block['data'] ?? [];

        // Check categories filter array (for portfolio_grid and portfolio_variation_3)
        if (isset($data['categories'])) {
            if (is_array($data['categories'])) {
                foreach ($data['categories'] as $categorySlug) {
                    if (!in_array($categorySlug, $validCategorySlugs)) {
                        $this->error("     ❌ Invalid category slug in filter: '{$categorySlug}'");
                        $issues++;
                    }
                }
                if ($issues === 0) {
                    $this->line("     ✅ Categories filter array: " . count($data['categories']) . " valid slugs");
                }
            } else {
                $this->error("     ❌ 'categories' should be an array, got: " . gettype($data['categories']));
                $issues++;
            }
        }

        // Check items
        if (isset($data['items']) && is_array($data['items'])) {
            $itemIssues = 0;
            $validItems = 0;
            $deprecatedFieldsFound = [];

            foreach ($data['items'] as $itemIndex => $item) {
                // Check category field
                if (isset($item['category'])) {
                    if (!in_array($item['category'], $validCategorySlugs)) {
                        $this->error("     ❌ Item #{$itemIndex}: Invalid category '{$item['category']}'");
                        $itemIssues++;
                    } else {
                        $validItems++;
                    }
                } else {
                    $this->warn("     ⚠️  Item #{$itemIndex}: Missing 'category' field");
                    $itemIssues++;
                }

                // Check for deprecated fields
                foreach ($this->deprecatedFields as $deprecatedField) {
                    if (isset($item[$deprecatedField])) {
                        $deprecatedFieldsFound[$deprecatedField] = ($deprecatedFieldsFound[$deprecatedField] ?? 0) + 1;
                    }
                }
            }

            if ($validItems > 0) {
                $this->line("     ✅ {$validItems} portfolio items with valid category slugs");
            }

            if (!empty($deprecatedFieldsFound)) {
                foreach ($deprecatedFieldsFound as $field => $count) {
                    $this->error("     ❌ Deprecated field '{$field}' found in {$count} item(s)");
                    $itemIssues++;
                }
            }

            $issues += $itemIssues;
        }

        return $issues;
    }
}
