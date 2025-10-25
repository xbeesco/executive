<?php

namespace App\Enums;

enum ArchiveTemplate: string
{
    case GRID_COL_2 = 'grid-col-2';
    case GRID_COL_3 = 'grid-col-3';
    case GRID_COL_4 = 'grid-col-4';
    case MASONRY = 'masonry';
    case CLASSIC = 'classic';

    public function file(): string
    {
        return "archive-{$this->value}";
    }

    public function label(): string
    {
        return match ($this) {
            self::GRID_COL_2 => 'شبكة (عمودين)',
            self::GRID_COL_3 => 'شبكة (ثلاث أعمدة)',
            self::GRID_COL_4 => 'شبكة (أربع أعمدة)',
            self::MASONRY => 'Masonry',
            self::CLASSIC => 'قائمة كلاسيكية',
        };
    }
}
