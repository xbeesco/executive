<?php

namespace Tests\Feature;

use App\Filament\Pages\SettingsPage;
use App\Models\Setting;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SettingsPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Set current panel to admin
        Filament::setCurrentPanel('admin');

        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_settings_page_loads_without_errors(): void
    {
        $component = Livewire::test(SettingsPage::class);

        $component->assertStatus(200);
        $component->assertSet('data.general.site_name', 'Executive');
        $component->assertSet('data.general.site_email', 'info@executive.com');
        $component->assertSet('data.general.site_phone', '');
        $component->assertSet('data.general.site_address', '');
    }

    public function test_settings_page_initializes_form_state_correctly(): void
    {
        // Create some existing settings
        Setting::setValue('general', [
            'site_name' => 'Test Site',
            'site_email' => 'test@example.com',
        ]);

        $component = Livewire::test(SettingsPage::class);

        $component->assertSet('data.general.site_name', 'Test Site');
        $component->assertSet('data.general.site_email', 'test@example.com');
    }

    public function test_settings_can_be_saved(): void
    {
        $component = Livewire::test(SettingsPage::class);

        // Fill form with test data
        $component->fillForm([
            'general' => [
                'site_name' => 'Updated Site Name',
                'site_email' => 'updated@example.com',
                'site_phone' => '123456789',
                'site_address' => 'Test Address',
                'site_logo' => '',
                'site_favicon' => '',
            ],
            'social_links' => [
                'facebook' => 'https://facebook.com/test',
                'twitter' => 'https://twitter.com/test',
                'instagram' => '',
                'linkedin' => '',
            ],
            'menu' => [],
            'seo_defaults' => [
                'meta_title' => 'Test Meta Title',
                'meta_description' => 'Test Meta Description',
                'meta_keywords' => 'test, keywords',
                'og_image' => '',
            ],
        ]);

        // Save settings
        $component->call('saveSettings');

        // Assert settings were saved to database
        $this->assertEquals('Updated Site Name', Setting::getValue('general')['site_name']);
        $this->assertEquals('updated@example.com', Setting::getValue('general')['site_email']);
        $this->assertEquals('https://facebook.com/test', Setting::getValue('social_links')['facebook']);
        $this->assertEquals('Test Meta Title', Setting::getValue('seo_defaults')['meta_title']);

        // Assert notification was sent
        $component->assertNotified();
    }

    public function test_settings_page_has_correct_form_structure(): void
    {
        $component = Livewire::test(SettingsPage::class);

        // Test that all expected form sections are initialized
        $component->assertSet('data.social_links', [
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'linkedin' => '',
        ]);

        $component->assertSet('data.menu', []);

        $component->assertSet('data.seo_defaults.meta_title', '');
        $component->assertSet('data.seo_defaults.meta_description', '');
        $component->assertSet('data.seo_defaults.meta_keywords', '');
    }
}
