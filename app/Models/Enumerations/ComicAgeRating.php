<?php

namespace App\Models\Enumerations;

enum ComicAgeRating: string
{
    case AllAges = 'all_ages';
    case Teen = 'teen';
    case TeenPlus = 'teen_plus';
    case Mature = 'mature';
    case Explicit = 'explicit';
}
