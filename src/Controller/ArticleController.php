<?php

namespace App\Controller;

use App\Article\CountViewUpdater;
use App\Article\NewArticleHandler;
use App\Article\UpdateArticleHandler;
use App\Article\ViewArticleHandler;
use App\Entity\Article;
use App\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Slug;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\VarDumper\Cloner\Data;
use DateTime;

/**
 * @Route(path="/article")
 */
class ArticleController extends Controller
{
    /**
     * @Route(path="/show/{slug}", name="article_show")
     */
    public function showAction(ViewArticleHandler $articleHandler)
    {
        return $this->render("Article/show.html.twig", ["article" => $article]);
    }

    /**
     * @Route(path="/new", name="article_new")
     */
    public function newAction(ViewArticleHandler $articleHandler, Request $request)
    {
        if(!$this->getUser()->IsAuthor())
            throw new AccessDeniedHttpException();

        $article = new Article();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $article->setAuthor($this->getUser());
            $slug = new Slug\SlugGenerator();
            $article->setSlug($slug->generate($article->getTitle()));
            $article->setCreatedAt(new DateTime('now'));
            $article->setUpdatedAt(new DateTime('now'));

            $em->persist($article);
            $em->flush();
        }

        return $this->render("Article/new.html.twig", ["form"=>$form->createView()]);

    }

    /**
     * @Route(path="/update/{slug}", name="article_update")
     */
    public function updateAction(ViewArticleHandler $articleHandler)
    {
        // Seul les auteurs doivent avoir access.
        // Seul l'auteur de l'article peut le modifier
    }
}
