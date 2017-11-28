<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Tag
{
    private $id;
    private $name;
    private $slug;

    // Uniquement des getter et un constructeur
}
