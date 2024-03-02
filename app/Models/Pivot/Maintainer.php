<?php

namespace App\Models\Pivot;

use App\Models\Comic;
use App\Models\Enums\AuditRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Maintainer extends Pivot
{
    protected $table = 'maintainers';

    protected $casts = [
        'role' => AuditRole::class,
    ];

    public function comic(): BelongsTo
    {
        return $this->belongsTo(Comic::class, 'comic_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
