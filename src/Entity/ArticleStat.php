<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ArticleStat
{
    const CREATE = 'create';
    const UPDATE = 'update';
    const VIEW = 'view';

    private $id;
    private $action;
    private $article;
    private $date;
    private $ip;
    private $user;

    // Uniquement des getter et un constructeur
}
