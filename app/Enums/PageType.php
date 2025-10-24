<?php

namespace App\Enums;

enum PageType: string
{
    case HOMEPAGE = 'homepage';
    case INNER_PAGE = 'inner_page';
    case ARCHIVE = 'archive';

    public function label(): string
    {
        return match($this) {
            self::HOMEPAGE => 'الصفحة الرئيسية',
            self::INNER_PAGE => 'صفحة داخلية',
            self::ARCHIVE => 'صفحة أرشيف',
        };
    }
}
