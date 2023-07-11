<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
      'title',
      'author',
      'status',
      'description',
    ];

    /* Relations */

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news',
            'news_id', 'category_id');
    }

    /* Scopes`s */

    public function scopeLastNews(Builder $query): void
    {
        $query->where('id', '>', '42');
    }
}
