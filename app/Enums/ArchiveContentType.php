<?php

namespace App\Enums;

enum ArchiveContentType: string
{
    case POST = 'post';
    case SERVICE = 'service';
    case EVENT = 'event';

    public function label(): string
    {
        return match($this) {
            self::POST => 'المقالات',
            self::SERVICE => 'الخدمات',
            self::EVENT => 'الفعاليات',
        };
    }

    public function modelClass(): string
    {
        return match($this) {
            self::POST => \App\Models\Post::class,
            self::SERVICE => \App\Models\Service::class,
            self::EVENT => \App\Models\Event::class,
        };
    }
}
