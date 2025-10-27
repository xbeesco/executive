<?php

if (! function_exists('image')) {
    /**
     * Get image URL with fallback to placeholder.
     *
     * This helper returns the image URL if it exists, otherwise returns
     * the field-specific placeholder. Works with:
     * - Model attributes ($post->featured_image)
     * - Settings values ($settings['general']['site_logo'])
     * - Block data ($block['data']['image'])
     * - Filament FileUpload component paths
     *
     * @param  string|null  $value  The image path/URL or null
     * @param  string|null  $field  Optional field name for field-specific placeholder
     * @return string The image URL or placeholder
     */
    function image(?string $value, ?string $field = null): string
    {
        // If value exists and not empty, process it
        if (! empty($value)) {
            // Check if this is a Filament uploaded file (stored in public disk)
            if (str_starts_with($value, 'images/')) {
                return \Illuminate\Support\Facades\Storage::disk('public')->url($value);
            }

            // Otherwise, return the value as-is (external URL or full path)
            return $value;
        }

        // Value is empty - return field-specific placeholder if configured
        if ($field) {
            $fieldPlaceholder = config("image_placeholder.{$field}");
            if ($fieldPlaceholder) {
                $baseUrl = 'https://xinterio-demo.pbminfotech.com/html-demo/images/';

                return $baseUrl.$fieldPlaceholder;
            }
        }

        // Fallback to default placeholder
        return config('image_placeholder.default', 'https://placehold.co/800x600/e5e7eb/6b7280?text=No+Image');
    }
}
