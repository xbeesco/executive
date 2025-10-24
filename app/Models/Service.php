<?php

namespace App\Models;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'icon',
        'features',
        'status',
        'seo',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'json',
            'features' => 'json',
            'seo' => 'json',
            'status' => ContentStatus::class,
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('status', ContentStatus::PUBLISHED->value);
    }
}
