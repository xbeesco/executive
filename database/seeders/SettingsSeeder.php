<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'general',
                'value' => [
                    'site_name' => 'Xinterio',
                    'site_email' => 'info@xinterio.com',
                    'site_phone' => '+1(212) 255-511',
                    'site_address' => 'Chicago HQ Estica cop, Macomb, MI 48042',
                    'site_logo' => 'https://xinterio-demo.pbminfotech.com/html-demo/images/logo.svg',
                    'site_favicon' => '/images/favicon.png',
                ],
                'description' => 'General site settings',
            ],
            [
                'key' => 'social_links',
                'value' => [
                    'facebook' => '#',
                    'twitter' => '#',
                    'instagram' => '#',
                    'linkedin' => '#',
                ],
                'description' => 'Social media links',
            ],
            [
                'key' => 'menu',
                'value' => [
                    [
                        'id' => 1,
                        'label' => 'Home',
                        'url' => '/',
                        'children' => [],
                    ],
                    [
                        'id' => 2,
                        'label' => 'About',
                        'url' => '/about',
                        'children' => [],
                    ],
                    [
                        'id' => 3,
                        'label' => 'Services',
                        'url' => '/services',
                        'children' => [],
                    ],
                    [
                        'id' => 4,
                        'label' => 'Contact',
                        'url' => '/contact',
                        'children' => [],
                    ],
                ],
                'description' => 'Main navigation menu',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
