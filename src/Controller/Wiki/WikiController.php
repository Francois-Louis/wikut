<?php

namespace App\Controller\Wiki;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\TopicRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wikutpedia")
 */
class WikiController extends AbstractController
{
    /**
     * @Route("/", name="wiki")
     */
    public function wiki(TopicRepository $topicRepo, ArticleRepository $articleRepo): Response
    {
        $topics = $topicRepo->findAll();
        $lastArticles = $articleRepo->findLastArticles();

        return $this->render('wiki/wiki.html.twig', [
            'topics' => $topics,
            'lastArticles' => $lastArticles,
        ]);
    }

    /**
     * @Route("/{slug}", name="wiki_theme")
     */
    public function wikiTheme(TopicRepository $topic, ArticleRepository $article): Response
    {


        return $this->render('wiki/theme.html.twig', [
            'controller_name' => 'WikiController',
        ]);
    }

    /**
     * @Route("/write-article", name="wiki_edit_article")
     * @IsGranted("ROLE_AUTHOR")
     */
    public function writeArticle(): Response
    {
        return $this->render('wiki/write.html.twig', [
            'controller_name' => 'WikiController',
        ]);
    }

    /**
     * @Route("/{slug}", name="wiki_article")
     */
    public function wikiArticle(): Response
    {
        return $this->render('wiki/article.html.twig', [
            'controller_name' => 'WikiController',
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="wiki_write_article")
     * @IsGranted("ROLE_AUTHOR")
     */
    public function editArticle(): Response
    {
        return $this->render('wiki/write.html.twig', [
            'controller_name' => 'WikiController',
        ]);
    }
}
