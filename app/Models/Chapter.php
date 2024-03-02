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
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function comic(): BelongsTo
    {
        return $this->belongsTo(Comic::class);
    }
}
