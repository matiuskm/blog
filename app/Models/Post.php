<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'is_published',
        'published_at',
        'author_id',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function excerpt(): string
    {
        return Str::words(strip_tags($this->content), 30);
    }

    public function getFormattedDate(): string
    {
        return $this->published_at->format('F jS Y');
    }

    public function getThumbnail(): string
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }
        return $this->thumbnail ? '/storage/' . $this->thumbnail : 'https://via.placeholder.com/1200x600.png?text=No+Image';
    }

    public function getContent(): string
    {
        $content = str_replace('<p>', '<p class="pb-3">', $this->content);
        $content = str_replace('<h2>', '<h2 class="text-2xl font-bold pb-3">', $content);
        $content = str_replace('<h3>', '<h3 class="text-2xl font-bold pb-3">', $content);
        return $content ?? '';
    }
}
