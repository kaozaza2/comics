<?php

namespace App\Models\Enums;

enum AuditRole: string
{
    const Maintainer = 'maintainer';

    const Owner = 'owner';
}
