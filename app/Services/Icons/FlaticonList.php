<?php

namespace App\Services\Icons;

class FlaticonList
{
    /**
     * Get all available Flaticon icons with their display names.
     *
     * @return array<string, string> Array of icon class names as keys and display names as values
     */
    public static function getIcons(): array
    {
        return [
            'pbmit-xinterio-icon-brickwall' => 'Brickwall',
            'pbmit-xinterio-icon-pantone' => 'Pantone / Color Palette',
            'pbmit-xinterio-icon-bathroom' => 'Bathroom',
            'pbmit-xinterio-icon-living-room' => 'Living Room',
            'pbmit-xinterio-icon-blueprint' => 'Blueprint',
            'pbmit-xinterio-icon-quote-left' => 'Quote Left',
            'pbmit-xinterio-icon-cushions' => 'Cushions',
            'pbmit-xinterio-icon-right-quotation-mark' => 'Quotation Mark Right',
            'pbmit-xinterio-icon-brickwall-1' => 'Brickwall Alt',
            'pbmit-xinterio-icon-star' => 'Star',
            'pbmit-xinterio-icon-stairs' => 'Stairs',
            'pbmit-xinterio-icon-star-1' => 'Star Filled',
            'pbmit-xinterio-icon-armchair' => 'Armchair',
            'pbmit-xinterio-icon-user' => 'User',
            'pbmit-xinterio-icon-kitchen' => 'Kitchen',
            'pbmit-xinterio-icon-bathtub' => 'Bathtub',
            'pbmit-xinterio-icon-axis' => 'Axis / Coordinates',
            'pbmit-xinterio-icon-trophy' => 'Trophy',
            'pbmit-xinterio-icon-house' => 'House',
            'pbmit-xinterio-icon-world' => 'World / Globe',
            'pbmit-xinterio-icon-3d' => '3D / Cube',
            'pbmit-xinterio-icon-portfolio' => 'Portfolio / Briefcase',
            'pbmit-xinterio-icon-paint' => 'Paint / Brush',
            'pbmit-xinterio-icon-satisfaction' => 'Satisfaction / Badge',
            'pbmit-xinterio-icon-bed' => 'Bed',
            'pbmit-xinterio-icon-phone' => 'Phone',
            'pbmit-xinterio-icon-blueprint-1' => 'Blueprint Plan',
            'pbmit-xinterio-icon-telephone' => 'Telephone',
            'pbmit-xinterio-icon-blueprint-2' => 'Blueprint Design',
            'pbmit-xinterio-icon-map' => 'Map',
            'pbmit-xinterio-icon-placeholder' => 'Location Pin',
            'pbmit-xinterio-icon-message' => 'Message / Email',
            'pbmit-xinterio-icon-right' => 'Arrow Right',
            'pbmit-xinterio-icon-left' => 'Arrow Left',
            'pbmit-xinterio-icon-up-right-arrow' => 'Arrow Up Right',
            'pbmit-xinterio-icon-check-mark' => 'Check Mark',
            'pbmit-xinterio-icon-wallet' => 'Wallet',
            'pbmit-xinterio-icon-clock' => 'Clock / Time',
            'pbmit-xinterio-icon-tick-mark' => 'Tick Mark',
            'pbmit-xinterio-icon-conversation' => 'Conversation / Chat',
            'pbmit-xinterio-icon-hard-hat' => 'Hard Hat / Safety',
            'pbmit-xinterio-icon-tools' => 'Tools / Wrench',
            'pbmit-xinterio-icon-house-design' => 'House Design',
            'pbmit-xinterio-icon-drill' => 'Drill',
            'pbmit-xinterio-icon-compass' => 'Compass',
            'pbmit-xinterio-icon-tape-measure' => 'Tape Measure',
            'pbmit-xinterio-icon-eco-home' => 'Eco Home / Green House',
            'pbmit-xinterio-icon-plastering' => 'Plastering / Trowel',
            'pbmit-xinterio-icon-calendar' => 'Calendar',
            'pbmit-xinterio-icon-people' => 'People / Team',
            'pbmit-xinterio-icon-warranty' => 'Warranty / Shield',
            'pbmit-xinterio-icon-premium' => 'Premium / Quality',
            'pbmit-xinterio-icon-offer' => 'Offer / Tag',
            'pbmit-xinterio-icon-engineer' => 'Engineer / Worker',
            'pbmit-xinterio-icon-award' => 'Award / Medal',
            'pbmit-xinterio-icon-magnifying-glass' => 'Search / Magnifying Glass',
            'pbmit-xinterio-icon-trolley' => 'Shopping Cart / Trolley',
            'pbmit-xinterio-icon-client' => 'Client / Customer',
        ];
    }

    /**
     * Get icons formatted for Filament Select options.
     *
     * @return array<string, string>
     */
    public static function getSelectOptions(): array
    {
        return self::getIcons();
    }

    /**
     * Get all icon class names only.
     *
     * @return array<int, string>
     */
    public static function getIconClasses(): array
    {
        return array_keys(self::getIcons());
    }

    /**
     * Get icon display name by class name.
     */
    public static function getIconName(string $iconClass): ?string
    {
        return self::getIcons()[$iconClass] ?? null;
    }

    /**
     * Search icons by name.
     *
     * @return array<string, string>
     */
    public static function searchIcons(string $query): array
    {
        $icons = self::getIcons();
        $query = strtolower($query);

        return array_filter($icons, function ($name) use ($query) {
            return str_contains(strtolower($name), $query);
        });
    }
}
