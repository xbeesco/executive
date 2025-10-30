<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Services\Icons\FlaticonList;
use Illuminate\Console\Command;

class FixIconsInDatabase extends Command
{
    protected $signature = 'icons:fix';

    protected $description = 'Fix invalid icon values in database pages by replacing them with valid icons from FlaticonList';

    /**
     * Mapping of invalid icon patterns to valid replacements
     */
    protected array $iconMapping = [
        // Image paths
        'blocks/icon-luxury.png' => 'pbmit-xinterio-icon-premium',
        'blocks/icon-productivity.png' => 'pbmit-xinterio-icon-trophy',
        'blocks/icon-networking.png' => 'pbmit-xinterio-icon-people',
        'blocks/icon-location.png' => 'pbmit-xinterio-icon-placeholder',

        // Invalid flaticon prefixes - Wellness & Lifestyle
        'flaticon-wellness' => 'pbmit-xinterio-icon-hard-hat',
        'flaticon-meditation' => 'pbmit-xinterio-icon-cushions',
        'flaticon-nutrition' => 'pbmit-xinterio-icon-trophy',
        'flaticon-wellness-spa' => 'pbmit-xinterio-icon-bathtub',

        // Invalid flaticon prefixes - Business & Office
        'flaticon-office-private' => 'pbmit-xinterio-icon-house',
        'flaticon-boardroom' => 'pbmit-xinterio-icon-living-room',
        'flaticon-event-space' => 'pbmit-xinterio-icon-world',
        'flaticon-strategy' => 'pbmit-xinterio-icon-blueprint',
        'flaticon-presentation' => 'pbmit-xinterio-icon-portfolio',
        'flaticon-collaboration' => 'pbmit-xinterio-icon-people',

        // Invalid flaticon prefixes - Design & Architecture
        'flaticon-architecture' => 'pbmit-xinterio-icon-blueprint',
        'flaticon-materials' => 'pbmit-xinterio-icon-brickwall',
        'flaticon-craftsmanship' => 'pbmit-xinterio-icon-tools',
        'flaticon-heritage' => 'pbmit-xinterio-icon-award',
        'flaticon-timeless' => 'pbmit-xinterio-icon-star',
        'flaticon-bespoke' => 'pbmit-xinterio-icon-paint',

        // Invalid flaticon prefixes - Services & Maintenance
        'flaticon-cleaning-luxury' => 'pbmit-xinterio-icon-satisfaction',
        'flaticon-maintenance-pro' => 'pbmit-xinterio-icon-tools',
        'flaticon-customization-design' => 'pbmit-xinterio-icon-paint',
        'flaticon-customization' => 'pbmit-xinterio-icon-paint',
        'flaticon-upgrade-premium' => 'pbmit-xinterio-icon-premium',

        // Invalid flaticon prefixes - Features & Benefits
        'flaticon-flexible-terms' => 'pbmit-xinterio-icon-wallet',
        'flaticon-scalable-space' => 'pbmit-xinterio-icon-house',
        'flaticon-global-network' => 'pbmit-xinterio-icon-world',
        'flaticon-exclusive-events' => 'pbmit-xinterio-icon-award',
        'flaticon-excellence' => 'pbmit-xinterio-icon-trophy',
        'flaticon-reputation' => 'pbmit-xinterio-icon-award',
        'flaticon-network' => 'pbmit-xinterio-icon-world',
        'flaticon-service' => 'pbmit-xinterio-icon-satisfaction',
        'flaticon-efficiency' => 'pbmit-xinterio-icon-premium',

        // Invalid flaticon prefixes - Process & Contact
        'flaticon-consultation' => 'pbmit-xinterio-icon-conversation',
        'flaticon-proposal' => 'pbmit-xinterio-icon-portfolio',
        'flaticon-transition' => 'pbmit-xinterio-icon-check-mark',
        'flaticon-phone-luxury' => 'pbmit-xinterio-icon-phone',

        // Invalid flaticon prefixes - Design & Environment
        'flaticon-ergonomics' => 'pbmit-xinterio-icon-armchair',
        'flaticon-nature' => 'pbmit-xinterio-icon-eco-home',
        'flaticon-acoustics' => 'pbmit-xinterio-icon-warranty',
        'flaticon-lighting' => 'pbmit-xinterio-icon-clock',

        // Invalid flaticon prefixes - Amenities
        'flaticon-dining' => 'pbmit-xinterio-icon-kitchen',
        'flaticon-technology' => 'pbmit-xinterio-icon-3d',
        'flaticon-library' => 'pbmit-xinterio-icon-armchair',
        'flaticon-cigar' => 'pbmit-xinterio-icon-cushions',
        'flaticon-golf' => 'pbmit-xinterio-icon-trophy',
        'flaticon-barber' => 'pbmit-xinterio-icon-engineer',

        // Invalid flaticon prefixes - Values & Benefits
        'flaticon-trust' => 'pbmit-xinterio-icon-warranty',
        'flaticon-community' => 'pbmit-xinterio-icon-people',
        'flaticon-flexibility' => 'pbmit-xinterio-icon-compass',
        'flaticon-value' => 'pbmit-xinterio-icon-wallet',
        'flaticon-innovation' => 'pbmit-xinterio-icon-3d',
        'flaticon-sustainability' => 'pbmit-xinterio-icon-eco-home',
        'flaticon-access' => 'pbmit-xinterio-icon-world',
        'flaticon-investment' => 'pbmit-xinterio-icon-portfolio',
    ];

    public function handle(): int
    {
        $this->info('Starting icon fix process...');
        $this->newLine();

        $validIcons = FlaticonList::getIconClasses();
        $pages = Page::all();
        $totalFixed = 0;

        $this->withProgressBar($pages, function ($page) use (&$totalFixed) {
            $content = $page->content;
            $modified = false;

            if ($content) {
                $content = $this->fixIconsRecursive($content, $modified);

                if ($modified) {
                    $page->content = $content;
                    $page->save();
                    $totalFixed++;
                }
            }
        });

        $this->newLine(2);
        $this->info("✓ Fixed icons in {$totalFixed} page(s)");
        $this->info('All invalid icon values have been replaced with valid ones from FlaticonList');

        return Command::SUCCESS;
    }

    /**
     * Recursively fix icon values in arrays
     */
    protected function fixIconsRecursive($data, &$modified): mixed
    {
        if (is_array($data)) {
            foreach ($data as $key => &$value) {
                // Check if this is an icon field
                if ($key === 'icon' || $key === 'phone_icon') {
                    if (is_string($value)) {
                        $originalValue = $value;

                        // Replace if matches our mapping
                        if (isset($this->iconMapping[$value])) {
                            $value = $this->iconMapping[$value];
                            $modified = true;
                        }
                        // Also handle any blocks/* pattern we might have missed
                        elseif (str_starts_with($value, 'blocks/')) {
                            $value = 'pbmit-xinterio-icon-house'; // Default fallback
                            $modified = true;
                        }
                        // Handle any other flaticon- prefixes we might have missed
                        elseif (str_starts_with($value, 'flaticon-')) {
                            $value = 'pbmit-xinterio-icon-star'; // Default fallback
                            $modified = true;
                        }
                    }
                } else {
                    // Recursively process nested arrays
                    $value = $this->fixIconsRecursive($value, $modified);
                }
            }
        }

        return $data;
    }
}
