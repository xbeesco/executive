<?php

if (! function_exists('image')) {
    /**
     * Get image URL with fallback to placeholder.
     *
     * This helper returns the image URL if it exists, otherwise returns
     * the default placeholder. Works with:
     * - Model attributes ($post->featured_image)
     * - Settings values ($settings['general']['site_logo'])
     * - Block data ($block['data']['image'])
     *
     * @param  string|null  $value  The image path/URL or null
     * @param  string|null  $field  Optional field name (reserved for future use)
     * @return string The image URL or placeholder
     */
    function image(?string $value, ?string $field = null): string
    {
        // If value exists and not empty, return it
        if (! empty($value)) {
            return $value;
        }

        // Otherwise, return the default placeholder
        return config('image_placeholder.default', 'https://placehold.co/800x600/e5e7eb/6b7280?text=No+Image');
    }
}
