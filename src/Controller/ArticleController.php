<?php

namespace App\Controller;

use DateTime;
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
        $articles = [
            [
                'title'     => 'Article1',
                'content'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt enim non tellus tincidunt volutpat. Ut gravida sodales suscipit. Fusce dictum nisl sit amet nulla varius, vel venenatis metus congue. Nam nibh tortor, dictum quis diam vel, aliquam sagittis arcu. Integer sollicitudin, mi vitae venenatis finibus, orci justo sodales justo, et aliquet mi urna congue leo. Cras auctor a felis ut suscipit. Etiam pharetra, ligula ac hendrerit lobortis, massa nunc porta libero, sed tempus lectus erat id leo. ',
                'image'     => 'test.svg',
                'createdAt' => new DateTime(),
            ],
            [
                'image'     => '',
                'content'   => 'Integer vulputate ut dolor tincidunt porttitor. Suspendisse nec dolor erat. Nam arcu velit, ultricies eu faucibus at, maximus at orci. Praesent a laoreet urna. Maecenas porttitor orci et vulputate volutpat. Phasellus vel purus condimentum, pellentesque magna eu, tristique neque. Pellentesque semper mauris ac sapien tincidunt vestibulum. Sed a sapien eget est tempor posuere id accumsan lacus. Mauris sit amet tellus sit amet arcu aliquet varius. Ut justo mi, fringilla vitae tellus quis, cursus vehicula diam. Donec et dui vitae felis mattis placerat. Integer non vestibulum mauris. Pellentesque nec quam pulvinar, pulvinar justo id, congue tortor. Nulla blandit accumsan fermentum. Pellentesque laoreet lectus imperdiet, laoreet nulla sed, faucibus ipsum. Etiam placerat lectus tempor aliquam condimentum.',
                'createdAt' => new DateTime(),
            ],
            [
                'content'   => 'Integer vulputate ut dolor tincidunt porttitor. Suspendisse nec dolor erat. Nam arcu velit, ultricies eu faucibus at, maximus at orci. Praesent a laoreet urna. Maecenas porttitor orci et vulputate volutpat. Phasellus vel purus condimentum, pellentesque magna eu, tristique neque. Pellentesque semper mauris ac sapien tincidunt vestibulum. Sed a sapien eget est tempor posuere id accumsan lacus. Mauris sit amet tellus sit amet arcu aliquet varius. Ut justo mi, fringilla vitae tellus quis, cursus vehicula diam. Donec et dui vitae felis mattis placerat. Integer non vestibulum mauris. Pellentesque nec quam pulvinar, pulvinar justo id, congue tortor. Nulla blandit accumsan fermentum. Pellentesque laoreet lectus imperdiet, laoreet nulla sed, faucibus ipsum. Etiam placerat lectus tempor aliquam condimentum.',
                'createdAt' => new DateTime(),
            ],
        ];

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
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
