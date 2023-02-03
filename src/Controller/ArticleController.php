<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(name: 'article_')]
class ArticleController extends AbstractController
{
    // Page d'accueil du blog, pour afficher les articles
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    // Afficher un article qu'on récupère par son slug
    #[Route('/{slug}', name: 'show')]
    public function show(string $slug): Response
    {
        dump($slug);
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
