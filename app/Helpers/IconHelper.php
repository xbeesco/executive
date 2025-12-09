<?php

if (! function_exists('icon_class')) {
    /**
     * Get normalized icon class string.
     *
     * This helper ensures the icon class is properly formatted with the base class.
     * Works with icon values from FlaticonList which store full classes like 'pbmit-xinterio-icon-tools'.
     *
     * @param  string|null  $value  The icon class or null
     * @return string The normalized icon class string
     */
    function icon_class(?string $value): string
    {
        if (empty($value)) {
            return '';
        }

        // If the value already contains the base class, return as-is
        if (str_contains($value, 'pbmit-xinterio-icon ')) {
            return $value;
        }

        // If it starts with 'pbmit-xinterio-icon-', add the base class
        if (str_starts_with($value, 'pbmit-xinterio-icon-')) {
            return 'pbmit-xinterio-icon ' . $value;
        }

        // For other icon sets (like pbmit-base-icon), return as-is
        return $value;
    }
}
