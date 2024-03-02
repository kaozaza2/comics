<?php

namespace App\Models\Enums;

enum ComicStatus: string
{
    const OnGoing = 'ongoing';

    const Complete = 'complete';

    const Abandoned = 'abandoned';

    const SeasonBreak = 'break';
}
