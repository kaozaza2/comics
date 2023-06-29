<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'episode',
        'description',
        'comic_id',
        'order_column',
        'pages',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'pages' => 'array',
    ];

    protected $appends = [
        'thumb',
    ];

    protected $hidden = [
        'thumb_path',
    ];

    public function comic(): BelongsTo
    {
        return $this->belongsTo(Comic::class);
    }
}
