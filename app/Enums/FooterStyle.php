<?php

namespace App\Enums;

enum FooterStyle: int
{
    case STYLE_1 = 1;
    case STYLE_2 = 2;
    case STYLE_3 = 3;
    case STYLE_8 = 8;

    public function file(): string
    {
        return "footer-{$this->value}";
    }

    public function label(): string
    {
        return match ($this) {
            self::STYLE_1 => 'النمط الأول',
            self::STYLE_2 => 'النمط الثاني',
            self::STYLE_3 => 'النمط الثالث',
            self::STYLE_8 => 'النمط الثامن',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::STYLE_1 => '#bb9a65',
            self::STYLE_2 => '#403226',
            self::STYLE_3 => '#000000',
            self::STYLE_8 => '#f5f5f5',
        };
    }
}
