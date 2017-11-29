<?php

namespace App\Article;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;

class ArticleFetcher
{
    private $em;
    private $limit;

    public function __construct(EntityManager $em, $limit)
    {
        $this->em = $em;
        $this->limit = $limit;
    }

    public function fetch() : array
    {
        // Retourne les 10 derniers articles.
        // La limit (ici 10) doit provenir d'une variable d'env.

        return $this->em->getRepository(Article::class)->findBy(
            array(),
            array('createdAt' => 'DESC'),
            $this->limit
        );
    }
}
