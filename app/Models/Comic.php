<?php

namespace App\Models;

use App\Models\Enums\ComicType;
use App\Models\Pivot\Maintainer;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Comic extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'alias',
        'synopsis',
        'type',
        'nsfw',
        'published_by',
        'published_at',
    ];

    protected $appends = [
        'thumb',
        'cover',
    ];

    protected $hidden = [
        'cover_path',
        'thumb_path',
    ];

    protected $casts = [
        'type' => ComicType::class,
        'published_at' => 'datetime',
    ];

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(Maintainer::class);
    }

    public function thumb(): Attribute
    {
        return Attribute::make(
            fn() => Storage::url($this->thumb_path),
        );
    }

    public function cover(): Attribute
    {
        return Attribute::make(
            fn() => Storage::url($this->cover_path),
        );
    }

    public function searchableAs(): string
    {
        return 'comics_index';
    }

    #[SearchUsingFullText(['title', 'alias', 'synopsis'])]
    public function toSearchableArray(): array
    {
        return $this->only($this->fillable);
    }
}
