<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\Order;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(name: 'article_')]
class ArticleController extends AbstractController
{
    public function __construct(private readonly ArticleRepository $articleRepository)
    {
    }

    // Page d'accueil du blog, pour afficher les articles
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $articles = $this->articleRepository->findForHome();

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    // Afficher un article qu'on récupère par son slug
    #[Route('/article/{slug}', name: 'show')]
    public function show(
        #[MapEntity(mapping: ['slug' => 'slug'])]
        Article $article
    ): Response {
        return $this->render('article/show.html.twig', [
            'slug' => $article->getSlug(),
            'article' => $article,
        ]);
    }
}
