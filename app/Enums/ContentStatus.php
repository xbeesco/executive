<?php

namespace App\Enums;

enum ContentStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';

    public function label(): string
    {
        return match($this) {
            self::DRAFT => 'مسودة',
            self::PUBLISHED => 'منشورة',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::DRAFT => 'warning',
            self::PUBLISHED => 'success',
        };
    }
}
