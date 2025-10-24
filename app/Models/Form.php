<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'fields',
        'settings',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'fields' => 'json',
            'settings' => 'json',
        ];
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(FormSubmission::class)
            ->orderBy('created_at', 'desc');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
