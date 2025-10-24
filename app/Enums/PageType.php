<?php

namespace App\Enums;

enum PageType: string
{
    case HOMEPAGE = 'homepage';
    case INNER_PAGE = 'inner_page';
    case ARCHIVE = 'archive';

    public function label(): string
    {
        return match ($this) {
            self::HOMEPAGE => 'Homepage',
            self::INNER_PAGE => 'Inner Page',
            self::ARCHIVE => 'Archive',
        };
    }
}
