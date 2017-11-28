<?php

namespace App\Controller;

use App\Article\ArticleFetcher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route(path="/", name="homepage")
     */
    public function indexAction(ArticleFetcher $articleFetcher)
    {
        return $this->render('Homepage/index.html.twig', ['articles' => $articleFetcher->fetch()]);
    }
}
