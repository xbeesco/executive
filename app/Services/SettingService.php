<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public static function get(string $key, mixed $default = null): mixed
    {
        return Setting::getValue($key, $default);
    }

    public static function getAll(): array
    {
        return [
            'general' => self::get('general', []),
            'social_links' => self::getSocialLinks(),
            'menu' => self::getMenu(),
        ];
    }

    public static function set(string $key, mixed $value): void
    {
        Setting::setValue($key, $value);
    }

    public static function getGeneral(?string $key = null, mixed $default = null): mixed
    {
        $general = self::get('general', []);

        if ($key === null) {
            return $general;
        }

        return $general[$key] ?? $default;
    }

    public static function setGeneral(array $data): void
    {
        $general = self::get('general', []);
        self::set('general', array_merge($general, $data));
    }

    public static function getSocialLinks(): array
    {
        return self::get('social_links', []);
    }

    public static function setSocialLinks(array $data): void
    {
        self::set('social_links', $data);
    }

    public static function getMenu(): array
    {
        return self::get('menu', []);
    }

    public static function setMenu(array $data): void
    {
        self::set('menu', $data);
    }

    public static function getSiteName(string $default = 'Executive CMS'): string
    {
        return self::getGeneral('site_name', $default);
    }

    public static function getSiteEmail(string $default = ''): string
    {
        return self::getGeneral('site_email', $default);
    }

    public static function getSitePhone(string $default = ''): string
    {
        return self::getGeneral('site_phone', $default);
    }

    public static function getSiteAddress(string $default = ''): string
    {
        return self::getGeneral('site_address', $default);
    }

    public static function getSiteLogo(string $default = '/images/logo.png'): string
    {
        return self::getGeneral('site_logo', $default);
    }

    public static function getSiteFavicon(string $default = '/images/favicon.png'): string
    {
        return self::getGeneral('site_favicon', $default);
    }
}
