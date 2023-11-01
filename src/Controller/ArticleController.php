<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(name: 'article_')]
class ArticleController extends AbstractController
{
    // Page d'accueil du blog, pour afficher les articles
    #[Route('/', name: 'index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAllByStatus(isDraft: false);

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    // Afficher un article qu'on récupère par son slug
    #[Route('/article/{slug}', name: 'show')]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
