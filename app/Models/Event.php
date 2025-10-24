<?php

namespace App\Models;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'featured_image',
        'start_date',
        'end_date',
        'location',
        'max_attendees',
        'status',
        'seo',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'json',
            'seo' => 'json',
            'status' => ContentStatus::class,
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('status', ContentStatus::PUBLISHED->value);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now())
            ->published()
            ->orderBy('start_date', 'asc');
    }
}
