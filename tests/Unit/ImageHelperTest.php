<?php

namespace Tests\Unit;

use Tests\TestCase;

class ImageHelperTest extends TestCase
{
    /**
     * Test that image helper returns the value when it exists.
     */
    public function test_returns_value_when_exists(): void
    {
        $imageUrl = 'https://example.com/image.jpg';
        $result = image($imageUrl);

        $this->assertEquals($imageUrl, $result);
    }

    /**
     * Test that image helper returns placeholder when value is null.
     */
    public function test_returns_placeholder_when_null(): void
    {
        $result = image(null);

        $this->assertEquals(config('image_placeholder.default'), $result);
    }

    /**
     * Test that image helper returns placeholder when value is empty string.
     */
    public function test_returns_placeholder_when_empty_string(): void
    {
        $result = image('');

        $this->assertEquals(config('image_placeholder.default'), $result);
    }

    /**
     * Test that image helper works with model attributes.
     */
    public function test_works_with_model_attributes(): void
    {
        // Simulate model attribute
        $post = (object) ['featured_image' => 'https://example.com/featured.jpg'];

        $result = image($post->featured_image);

        $this->assertEquals('https://example.com/featured.jpg', $result);
    }

    /**
     * Test that image helper works with settings arrays.
     */
    public function test_works_with_settings_arrays(): void
    {
        $settings = [
            'general' => [
                'site_logo' => 'https://example.com/logo.svg',
            ],
        ];

        $result = image($settings['general']['site_logo'] ?? null);

        $this->assertEquals('https://example.com/logo.svg', $result);
    }

    /**
     * Test that image helper returns placeholder for missing settings.
     */
    public function test_returns_placeholder_for_missing_settings(): void
    {
        $settings = [];

        $result = image($settings['general']['site_logo'] ?? null);

        $this->assertEquals(config('image_placeholder.default'), $result);
    }

    /**
     * Test that placeholder configuration exists.
     */
    public function test_placeholder_config_exists(): void
    {
        $placeholder = config('image_placeholder.default');

        $this->assertNotNull($placeholder);
        $this->assertIsString($placeholder);
        $this->assertStringContainsString('http', $placeholder);
    }
}
