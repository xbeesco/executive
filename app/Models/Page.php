<?php

namespace App\Models;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'status',
        'settings',
        'seo',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'json',
            'settings' => 'json',
            'seo' => 'json',
            'status' => ContentStatus::class,
        ];
    }

    public function isArchive(): bool
    {
        return $this->settings['is_archive'] ?? false;
    }

    public function getPageType(): string
    {
        return $this->isArchive() ? 'archive' : 'inner_page';
    }

    public function getHeaderStyle(): int
    {
        return $this->settings['header_style'] ?? 3;
    }

    public function getFooterStyle(): int
    {
        return $this->settings['footer_style'] ?? 3;
    }

    public function getArchiveTemplate(): string
    {
        return $this->settings['archive_template'] ?? 'grid-col-3';
    }

    public function getArchiveContentType(): string
    {
        return $this->settings['archive_content_type'] ?? 'post';
    }

    public function useDemoSections(): bool
    {
        return $this->settings['use_demo_sections'] ?? false;
    }

    public function scopePublished($query)
    {
        return $query->where('status', ContentStatus::PUBLISHED->value);
    }
}
