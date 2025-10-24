<?php

namespace App\Models;

use App\Enums\CommentStatus;
use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author_id',
        'status',
        'published_at',
        'seo',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'json',
            'seo' => 'json',
            'published_at' => 'datetime',
            'status' => ContentStatus::class,
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)
            ->where('status', CommentStatus::APPROVED->value)
            ->orderBy('created_at', 'desc');
    }

    public function allComments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', ContentStatus::PUBLISHED->value);
    }
}
