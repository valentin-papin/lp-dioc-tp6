<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Article
{
    private $id;
    private $title;
    private $slug;
    private $content;
    private $author;
    private $countView = 0;
    private $tags;
    private $updatedAt;
    private $createdAt;
}
