<?php

namespace App\Article;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;

class ArticleFetcher
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function fetch() : array
    {
        // Retourne les 10 derniers articles.
        // La limit (ici 10) doit provenir d'une variable d'env.

        return $this->em->getRepository(Article::class)->findAll();
    }
}
