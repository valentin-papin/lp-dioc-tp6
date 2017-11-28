<?php

namespace App\Slug;

use Cocur\Slugify\Slugify;

class SlugGenerator
{
    public function generate(string $name): string
    {
        $slugify = new Slugify();

        return $slugify->slugify($name);
    }
}
