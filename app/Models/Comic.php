<?php

namespace App\Models;

use App\Models\Enumerations\ComicAgeRating;
use App\Models\Enumerations\ComicType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'slug',
        'writers',
        'artists',
        'language',
        'age_rating',
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
        'age_rating' => ComicAgeRating::class,
        'writers' => 'array',
        'artists' => 'array',
        'published_at' => 'datetime',
    ];

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'maintainers')
            ->withPivot('role');
    }

    public function thumb(): Attribute
    {
        return Attribute::make(
            fn () => Storage::url($this->thumb_path),
        );
    }

    public function cover(): Attribute
    {
        return Attribute::make(
            fn () => Storage::url($this->cover_path),
        );
    }
}
